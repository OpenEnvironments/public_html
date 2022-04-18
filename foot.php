<!------- Footer Area ------------->
<table width="100%" class="OEfooter"> 
	<tr>
		<td width="100%" colspan="6">
			<br>
		</td>
	</tr>
	<tr style="font-size: large; vertical-align: middle;">
		<td width="44%" style="text-align: right;">

		</td>
		<td width="3%">
			<a href="https://www.linkedin.com/company/open-environments-llc">
				<img src="images/linkedin.png" class="OEsocial"></a>
		</td>
		<td width="3%">
			<a href="https://twitter.com/datamastery">
				<img src="images/twitter.png" class="OEsocial"></a>
		</td>
		<td width="3%">
			<a href="https://www.facebook.com/openenvironments">
				<img src="images/facebook.png" class="OEsocial"></a>
		</td>
		<td width="3%">
			<a href="https://www.instagram.com/openenvironments/">
				<img src="images/instagram.png" class="OEsocial"></a>
		</td>
		<td width="44%"></td>
	</tr>	
	<tr>
		<td width="100%" colspan="6" style="font-size: x-small; text-align: center;">
			<strong>&#169;2004-2021 Open Environments - All Rights Reserved<br><br>
		</td>
	</tr>
</table>
<!------  FUNCTIONALLY THE END OF HTML CONTENT DEFINITION ------------------>
<!------  FOLLOWED BY PROCESSING THAT CHANGES THAT CONTENT ----------------->

<!------  Javascript that gives action to the objects defined before this footer.  ------------------>
<script type="text/javascript" src="js/modals.js"></script>

<!------  Set security condition, logged in or not, confirming cookies ----------------->
<?php
					if (isset($_SESSION['member_name'])) {
						echo "<script>
							document.getElementById('OElogin').style.display = 'none';
							document.getElementById('OElogout').style.display = 'block';
							document.getElementById('OEsettings').style.display = 'block';
							document.getElementById('OEsettingsgrayed').style.display = 'none';
							document.getElementById('OEprofilegrayed').style.display = 'block';
							document.getElementById('OEprofile').style.display = 'none';
							document.getElementById('OEprofile').innerHTML = '' ;
							document.getElementById('OEnotifications').style.display = 'block';
							document.getElementById('OEnotificationsgrayed').style.display = 'none';
							</script>";
					} else {
						echo "<script>
							document.getElementById('OElogin').style.display = 'block';
							document.getElementById('OElogout').style.display = 'none';
							document.getElementById('OEsettings').style.display = 'none';
							document.getElementById('OEsettingsgrayed').style.display = 'block';
							document.getElementById('OEprofilegrayed').style.display = 'none';
							document.getElementById('OEprofile').style.display = 'block';
							document.getElementById('OEprofile').innerHTML = '' ;
							document.getElementById('OEnotifications').style.display = 'none';
							document.getElementById('OEnotificationsgrayed').style.display = 'block';
							</script>";
					}
?>
<!------  PHP processing to field submit events that preceded this page  ------------------>

<?php
	if(isset($_POST['submit'])) 
		{
		 	switch ($_POST['submit']) {
				case "OK":
					/* A message popup was closed, so close any all modals */
					break;
				case "Change":
					/* the email exists for a member id other than this one */
					/*  
					/* The member_id hasnt been changed - has the requested email address been used by another*/
					$query = "SELECT * FROM core.member 
							WHERE member_email = '".$_POST['OEchange_form_email']."'
							AND member_id <> '".$_POST['OEchange_form_id']."' ;";
					$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
					if (!$conn) {  echo "Database connection error!\n";  exit;}
					$cursor = pg_query($conn,$query);
					if (!$cursor) {  echo "An error occurred.\n";  exit;}
					$num_rows = pg_num_rows($cursor);
					if ( $num_rows > 0 ) {
						echo "<script>OEmessage_open('The email <b>".$_POST['OEchange_form_email']."</b> is already registered to another Open Environments member.<br>Contact support@openenvironments.com if you have any concerns or need additional help.')</script>";
					} else {
						$query = "UPDATE core.member SET 
								member_name = '".$_POST['OEchange_form_name']."',
								member_email = '".$_POST['OEchange_form_email']."',
								member_password = '".$_POST['OEchange_form_pwdnew']."'
								WHERE member_id = '".$_POST['OEchange_form_id']."';";
						$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
						if (!$conn) {  echo "Database connection error!\n";  exit;}
						$cursor = pg_query($conn,$query);
						if (!$cursor) {  echo "An error occurred.\n";  echo pg_last_error($conn);  exit;}
						$num_rows = pg_num_rows($cursor);
						echo "<script>OEmessage_open('<br>Your member information has been updated.');</script>";
						}
						break;
				case "Register":
					/* does the email already exist */
					$query = "SELECT * FROM core.member WHERE member_email = '".$_POST['OEregister_form_email']."';";
					$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
					if (!$conn) {  echo "Database connection error!\n";  exit;}
					$cursor = pg_query($conn,$query);
					if (!$cursor) {  echo "An error occurred.\n";  exit;}
					$num_rows = pg_num_rows($cursor);
					if ( $num_rows > 0 ) {
						echo "<script>OEmessage_open('The member email <b>".$_POST['OEregister_form_email']."</b> is already registered.')</script>";
					} else {
						$query = "INSERT INTO core.member (
									member_id,
									member_email,
									member_name,
									member_password,
									member_validation,
									member_validated,
									member_enabled,
									member_created,
									member_notes
								) VALUES (
									(SELECT MAX(member_id) + 1 FROM core.member),
									'".$_POST['OEregister_form_email']."',
									'".$_POST['OEregister_form_name']."',
									'".$_POST['OEregister_form_pwdnew']."',
									'".strtoupper(base64_encode(openssl_random_pseudo_bytes(3*(16>>2))))."',
									'N',
									'N',
									current_date,
									'');
									";
						$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
						if (!$conn) {  echo "Database connection error!\n";  exit;}
						$cursor = pg_query($conn,$query);
						if (!$cursor) {  echo "An error occurred.\n";  echo pg_last_error($conn);  exit;}
						$num_rows = pg_num_rows($cursor);
						echo "<script>OEmessage_open('<br>Welcome to Open Environments!<br><br>You will receive an email shortly with a link to validate this registration.');</script>";
						}
						/* break;  */
						/**/
						/* a successful registration should be followed by logging in that new registrant!*/
						/* */
						$_POST['OElogin_form_email'] = $_POST['OEregister_form_email'];
						$_POST['OElogin_form_pass'] = $_POST['OEregister_form_pwdnew'];
				case "Login":
				        /* fetch this email from the member table  1) unknown,  2) known wrong pass  3) known confirmed pass */
					$query = "SELECT * FROM core.member 
							WHERE member_email = '".$_POST['OElogin_form_email']."'
							AND   member_password = '".$_POST['OElogin_form_pass']."'";
					$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
					if (!$conn) {  echo "Database connection error!\n";  exit;}
					$cursor = pg_query($conn,$query);
					if (!$cursor) {  echo "An error occurred.\n";  exit;}
					$num_rows = pg_num_rows($cursor);
 					if ( $num_rows < 1 ) {
						echo "<script>OEmessage_open('Invalid email/password combination:".$_POST['OElogin_form_email'].")</script>";
					} else { 
						$member = pg_fetch_row($cursor);  
						$_SESSION["member_id"] = $member[0];
						$_SESSION["member_email"] = $member[1];
						$_SESSION["member_name"] = $member[2];
						$_SESSION["member_password"] = $member[3];
						/* Now logged in, but need to reload the page to refresh the icons in the head */
						echo "<script>window.location=window.location;</script>";
					}
					break;
				default:
		  			echo "<script>OEmessage_open('An error occurred. A form was submitted with an unknown value of: ".$_POST['submit'].")</script>";
					break;
				}
		}
?>  <!--- post processing submit events that may have preceeded the page --->
</body>
</html>