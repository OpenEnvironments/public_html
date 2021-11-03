<!------- Footer Area ------------->
<table width="100%" class="OEfooter"> 
	<tr>
		<td width="100%" colspan="6">
			<br><br>
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
		<td width="100%" colspan="6" style="text-align: center;">
			<strong>&#169;2004-2021 Open Environments - All Rights Reserved<br><br>
		</td>
	</tr>
</table>
<!------  FUNCTIONALLY THE END OF HTML CONTENT DEFINITION ------------------>
<!------  FOLLOWED BY PROCESSING THAT CHANGES THAT CONTENT ----------------->

<!------  Javascript that gives action to the objects defined before this footer.  ------------------>
<script type="text/javascript" src="js/modals.js"></script>

<!------  PHP processing to field submit events that preceded this page  ------------------>

<?php
	if(isset($_POST['submit'])) 
		{
		 	switch ($_POST['submit']) {
				case "OK":
					/* A message popup was closed, so close any all modals */
					echo "<script>OEmessage_close()</script>";
					break;
				case "Register":
					/* does the email already exist */
					$query = "SELECT * FROM core.member WHERE member_email = '".$_POST['OEregister_form_email']."';";
					$conn = pg_connect("host=" . $OE_host . " port=" . $OE_port . " dbname=" . $OE_name . " user=" . $OE_user . " password=" . $OE_pass);
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
						$conn = pg_connect("host=" . $OE_host . " port=" . $OE_port . " dbname=" . $OE_name . " user=" . $OE_user . " password=" . $OE_pass);
						if (!$conn) {  echo "Database connection error!\n";  exit;}
						$cursor = pg_query($conn,$query);
						if (!$cursor) {  echo "An error occurred.\n";  echo pg_last_error($conn);  exit;}
						$num_rows = pg_num_rows($cursor);
						echo "<script>OEmessage_open('<br>Welcome to Open Environments!<br><br>You will receive an email shortly with a link to validate this registration.');</script>";
						}
						break;
				case "Login":
				        /* fetch this email from the member table  1) unknown,  2) known wrong pass  3) known confirmed pass */
					$query = "SELECT * FROM core.member WHERE member_email = '".$_POST['OElogin_form_email']."';";
					$conn = pg_connect("host=" . $OE_host . " port=" . $OE_port . " dbname=" . $OE_name . " user=" . $OE_user . " password=" . $OE_pass);
					if (!$conn) {  echo "Database connection error!\n";  exit;}
					$cursor = pg_query($conn,$query);
					if (!$cursor) {  echo "An error occurred.\n";  exit;}
					$num_rows = pg_num_rows($cursor);
					echo $num_rows; 
					if ( $num_rows < 1 ) {
						echo "<script>OEmessage_open('That email is not registered with Open Environments.')</script>";
					} else { 
						$member = pg_fetch_assoc($cursor);
						if($member['member_password'] == $_POST['OElogin_form_pass']) 
						{
							/* LOGIN SUCCESS  */
							echo "<script>OEloggedin('" . $_POST['OElogin_form_email'] . "','" . $_POST['OElogin_form_pass'] . "');</script>";

						} else {
							/* LOGIN FAILURE  */
							echo "<script>OEmessage_open('Wrong password.');</script>";
						}
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