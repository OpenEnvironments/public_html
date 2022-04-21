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
<script type="text/javascript" src="js/modals.js"></script>

<!------  Set security condition, logged in or not, confirming cookies ----------------->
<?php
					if (isset($_SESSION['OEmember_name'])) {
						echo "<script>
							document.getElementById('OElogin').style.display = 'none';
							document.getElementById('OElogout').style.display = 'block';
							document.getElementById('OEsettings').style.display = 'block';
							document.getElementById('OEsettingsgrayed').style.display = 'none';
							document.getElementById('OEprofile').style.display = 'block';
							document.getElementById('OEprofilegrayed').style.display = 'none';
							document.getElementById('OEnotifications').style.display = 'block';
							document.getElementById('OEnotificationsgrayed').style.display = 'none';
							</script>";
					} else {
						echo "<script>
							document.getElementById('OElogin').style.display = 'block';
							document.getElementById('OElogout').style.display = 'none';
							document.getElementById('OEsettings').style.display = 'none';
							document.getElementById('OEsettingsgrayed').style.display = 'block';
							document.getElementById('OEprofile').style.display = 'none';
							document.getElementById('OEprofilegrayed').style.display = 'block';
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
				case "Profile":
					/* The profile change modal just completed */
					/* the email exists for a member id other than this one */
					/* The member_id hasnt been changed - has the requested email address been used by another*/
					$query = "SELECT * FROM core.member 
							WHERE member_email = '" . $_POST['OEprofile_form_email'] . "'
							AND member_id <> '" . $_POST['OEprofile_form_id']."' ;";
					$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
					if (!$conn) {  echo "Database connection error!\n";  exit;}
					$cursor = pg_query($conn,$query);
					if (!$cursor) {  echo "An error occurred.\n";  exit;}
					$num_rows = pg_num_rows($cursor);
					echo "num_rows=" . $num_rows . " email " . $_POST['OEprofile_form_email'];
					if ( $num_rows > 0 ) {
						echo "<script>OEmessage_open('The email <b>".$_POST['OEprofile_form_email']."</b> is already registered to another Open Environments member.<br>Contact support@openenvironments.com if you have any concerns or need additional help.')</script>";
					} else {
						$query = "UPDATE core.member SET 
								member_name = '".$_POST['OEprofile_form_name']."',
								member_email = '".$_POST['OEprofile_form_email']."',
								member_password = '".$_POST['OEprofile_form_pwdnew']."'
								WHERE member_id = '".$_POST['OEprofile_form_id']."';";
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
									'".strtoupper(substr(md5(time()), 0, 16))."',
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
						OEmail(
							$_POST['OEregister_form_email'],  /* TO email */
							$_POST['OEregister_form_name'],   /* TO name */
							'support@openenvironments.com',   /* FROM email */
							'Open Environments',              /* FROM name */
							'Membership Verification',        /* SUBJECT */
                            'Hello World'												
							/* message body */
						);
						echo "<script>OEmessage_open('<br>Welcome to Open Environments!<br><br>You will receive an email shortly with a link to validate this registration.');</script>";
					}
					break;  
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
						session_start();
						$_SESSION["OEmember_id"] = $member[0];
						$_SESSION["OEmember_email"] = $member[1];
						$_SESSION["OEmember_name"] = $member[2];
						$_SESSION["OEmember_password"] = $member[3];
						/* The profile form's variables are initialized to the session values*/
						$_POST['OEprofile_form_id'] = $_SESSION['OEmember_id'];
						$_POST['OEprofile_form_name'] = $_SESSION['OEmember_name'];
						$_POST['OEprofile_form_email'] = $_SESSION['OEmember_email'];
						$_POST['OEprofile_form_pwdnew'] = $_SESSION['OEmember_password'];
						$_POST['OEprofile_form_pwdcon'] = $_SESSION['OEmember_password'];
					}
					echo "<script>window.location.href = window.location.href</script>";	
					break;
				default:
					break;
				} /* switch statement */
		}
?>  <!--- post processing submit events that may have preceeded the page --->
</body>
</html>