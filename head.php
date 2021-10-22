<?php

include "admin/settings.php";

/* get the metadata for the current page */

$page_id = $GLOBALS["page_id"];
$query = "SELECT * FROM core.page WHERE page_id = '".$page_id."';";
$conn = pg_connect("host=" . $OE_host . " port=" . $OE_port . " dbname=" . $OE_name . " user=" . $OE_user . " password=" . $OE_pass);
if (!$conn) {  echo "Database connection error!\n";  exit;}
$cursor = pg_query($conn,$query);
if (!$cursor) {  echo "An error occurred.\n";  exit;}
$num_rows = pg_num_rows($cursor);
if ( $num_rows > 1 ) {    $title = "Open Environments - MULTIPLE PAGES FOUND";
} elseif ( $num_rows < 1 ) {    $title = "Open Environments - NO PAGES FOUND";
} else {    $row = pg_fetch_array($cursor);    $title = $row[1];};


?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/oe.css" />
		<link rel="icon" type="image/png" href="images/oeicon154.png" sizes="any">
		<title><?= $title ?></title>
		<script src="js/cookies.js"></script>
		<script src="js/googleanalytics.js"></script>
		<script src="js/modals.js"></script>
		<script src="js/tools.js"></script>
		<!--Insert OG Markup for Social Media site previews -->
			<meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
			<meta prefix="og: http://ogp.me/ns#" property="og:title" content="Open Environments" />
			<meta prefix="og: http://ogp.me/ns#" property="og:description" content="AI for the rest of us" />
			<meta prefix="og: http://ogp.me/ns#" property="og:image" content="https://openenvironments.com/images/oesmall.png" />	
			<meta prefix="og: http://ogp.me/ns#" property="og:url" content="https://openenvironments.com" />
	</head>
<body>

<!------------   Cookies Policy consent needs to be established at page opening   -------->
<div w3-include-html="html/cookienotice.html"></div> 
<script>
	let cookie_consent = getCookie("OE_cookie_consent");
	if(cookie_consent != ""){document.getElementById("cookieNotice").style.display = "none";}
	else{document.getElementById("cookieNotice").style.display = "block";}
</script>

<!--------- DIVs for managing popups ----------->

<div id="OEmodal" class="OEmodal">
</div> <!______ modal close _______>

<div id="OEmessage" class="OEmessage">
	<div id="OEmessage_content" class="OEmessage_content"></div>
	<div style="position: relative; width: 100%; height: 32px;">
<input type="button" class="OEOKbutton" onClick="return OEclose();" value="OK"></input>  
	</div>

</div> <!______ message form close _______>

<div id="OElogin" class="OElogin">
	<form method="post"
	  	action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
			Login Here
		<button type="submit" style="font_size: 20px" 
		value="&nbsp;&nbsp;OK&nbsp;&nbsp;"></button>&nbsp;&nbsp;
	</form>
</div><!______ login form close _______>

<div id="OEregister" class="OEregister">
	<form name="OEregister" method="post" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<table style="width: 100%;">
			<tr>
				<td colspan="2"><b>&nbsp;Registration:</b><br></td>
				<td align="right">
					<button class="OEclosebutton" onclick="OEclose()">&times;</button>
				</td>
			</tr>
			<tr>
				<td width="30%" class="OEregister-form-labels">
					<label>Your Name:&nbsp;</label></td>
				<td width="30%" class="OEregister-form-inputs">
					<input type="text" name="OEregister_form_name" 
					value="<?php echo $_POST['OEregister_form_name']; ?>"></td>
				<td width="40%" class="OEregister-form-errors">
					<div id="OEregister_form_name_err">
					<?php echo $_POST['OEregister_form_name']?></div></td>
			</tr>
			<tr>
				<td width="30%" class="OEregister-form-labels">
					<label>Email:&nbsp;</label></td>
				<td width="30%" class="OEregister-form-inputs">
					<input type="text" name="OEregister_form_email" 
					value="<?php echo $OEregister_form_email; ?>"></td>
				<td width="40%" class="OEregister-form-errors">
					<div id="OEregister_form_email_err">
					<?php echo $OEregister_form_email_err;?></div></td>
			</tr>
			<tr>
				<td width="30%" class="OEregister-form-labels">
					<label>Password:&nbsp;</label></td>
				<td width="30%" class="OEregister-form-inputs">
					<input type="password" name="OEregister_form_pwdnew" 
					value="<?php echo $OEregister_form_pwdnew; ?>"></td>
				<td width="40%" class="OEregister-form-errors">
					<div id="OEregister_form_pwdnew_err">
					<?php echo $OEregister_form_pwdnew_err;?></div></td>
			</tr>
			<tr>
				<td width="30%" class="OEregister-form-labels">
					<label>Confirm:&nbsp;</label></td>
				<td width="30%" class="OEregister-form-inputs">
					<input type="password" name="OEregister_form_pwdcon" 
					value="<?php echo $OEregister_form_pwdcon; ?>"></td>
				<td width="40%" class="OEregister-form-errors">
					<div id="OEregister_form_pwdcon_err">
					<?php echo $OEregister_form_pwdcon_err;?></div></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="right">
					<input type="submit" name="OEregister_submit" 
						style="width: 80px; height: 20px;  margin: 0;  color: black;  font-size: 12px;" 
						value="&nbsp;&nbsp;Register&nbsp;&nbsp;">&nbsp;&nbsp;
				</td>
			</tr>
		</table>
	</form>
</div>  <!______ registration form close _______>


<!--------- Header Content ----------->

<table width="100%" class="OEheader"> 
	<tr>
		<td width="20%" rowspan="2" vertical-align="center">
			<table width="100%">
				<tr>
					<td>
						<!---  image is 746 x 232px tall -->
						<a href="https://openenvironments.com/index.php">
							<img src="images/oesmall.png" style="height: 65px;"></img>
						</a>
					</td>
				</tr>
			</table>
		</td>
		<td width="60%">
			<table style="width: 100%; border-spacing: 0px 0px;">
				<tr align="top">
					<td colspan="6" class="OEquickfilter">Quick Filter</td>
				</tr>
				<tr>
					<td style="width: 20%;">&nbsp;</td>
					<td width="15%" class="OEquickfilter-item">
						<a href="publishers.php">Publishers</a>
					</td>
					<td width="15%" class="OEquickfilter-item">
						<a href="publications.php">Publications</a>
					</td>
					<td width="15%" class="OEquickfilter-item">
						<a href="subjects.php">Subjects</a>
					</td>
					<td width="15%" class="OEquickfilter-item">
						<a href="models.php">Models</a>
					</td>
					<td style="width: 20%;">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td width="20%"> 
			<table width="100%">
				<tr>
					<td></td>
					<td width="100%" colspan="6">
						<div>
							<form action="/" method="GET" class="OEsearch-form">
							  <input type="search" class="OEsearch-field" size=30 >
							  <button type="submit" class="OEsearch-button">
								<img src="images/search.png">
							  </button>
							</form>
						</div>
					</td>
				</tr>
				<tr>
					<td width="28%"> 
						<button id="OEregister-button" onclick="OEregister_open()">Register!</button>
					</td>
					<td width="12%" align="center">
						<a href="help.php"><img src="images/question.png" class="OEicon"></a>
					</td>
					<td width="12%" align="center">
						<a href="settings.php"><img src="images/gear.png" class="OEicon"></a>
					</td>
					<td width="12%" align="center">
						<a href="profile.php"><img src="images/profile.png" class="OEicon"></a>
					</td>
					<td width="12%" align="center">
						<a href="notifications.php"><img src="images/bell.png" class="OEicon"></a>
					</td>
					<td width="12%" align="center">
						<a href="cart.php"><img src="images/cart.png" class="OEicon"></a>
					</td>
					<td width="12%" align="center">
						<div class="OEmenu">
							<button style="border:none;">
							<img align="center" src="images/hamburger.png" class="OEicon"">
							<div class="OEmenu-content">
								<a href="about.php">About</a>
								<a href="privacy-policy.php">Privacy Policy</a>
								<a href="cookies-policy.php">Cookies Policy</a>
								<a href="terms.php">Terms of Service</a>
								<a href="contact.php">Contact</a>
							</div>
							</button>
						</div>
 					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?php
/*-------- form processing upfront --------- */

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	/*------ was the register form submitted ------*/
	if(isset($_POST['OEregister_submit'])){
		/* VALIDATE */
		/* name processing */
		$OEregister_form_name       = test_input($_POST["OEregister_form_name"]);
		if(empty($OEregister_form_name))   {$OEregister_form_name_err   = "Name is missing";}

		/* email processing */
		$OEregister_form_email      = test_input($_POST["OEregister_form_email"]);
		$reg="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
		if((preg_match($reg, $OEregister_form_email)) ? FALSE : TRUE) {$OEregister_form_email_err = "Invalid email address.";}
		/* note - an empty emaill addr is ALSO invalid, so the empty test must follow the invalid test */
		if(empty($OEregister_form_email))  {$OEregister_form_email_err  = "Email is missing";}
		if(empty($OEregister_form_email_err))  /* email is not missing and email is valid format, lets see if it already exists */
			{
			$query = "SELECT * FROM core.member WHERE member_email = '".$OEregister_form_email."';";
			$conn = pg_connect("host=" . $OE_host . " port=" . $OE_port . " dbname=" . $OE_name . " user=" . $OE_user . " password=" . $OE_pass);
			if (!$conn) {  echo "Registration Form: database connection error!\n";  exit;}
			$cursor = pg_query($conn,$query);
			if (!$cursor) {  echo "Registration Form: query error occurred.\n";  exit;}
			$num_rows = pg_num_rows($cursor);
			if ( $num_rows > 0 ) {$OEregister_form_email_err  = "Email is already registered!";}
			}

		/* New password processing */
		$OEregister_form_pwdnew     = test_input($_POST["OEregister_form_pwdnew"]);
		if(empty($OEregister_form_pwdnew)) {$OEregister_form_pwdnew_err = "Password is missing";}

		/* Password confirmation processing */
		$OEregister_form_pwdcon     = test_input($_POST["OEregister_form_pwdcon"]);
		if(empty($OEregister_form_pwdcon)) {$OEregister_form_pwdcon_err = "Confirmation is missing";}
		if($OEregister_form_pwdcon != $OEregister_form_pwdnew) {$OEregister_form_pwdcon_err = "Confirmation does not match";}

		/* IF ALL ERRS ARE BLANK WE CAN PROCEED, ELSE RE-RENDER THE REGISTER MODAL */
		if(
			empty($OEregister_form_name_err)    &&
			empty($OEregister_form_email_err)   &&
			empty($OEregister_form_pwdnew_err)  &&
			empty($OEregister_form_pwdcon_err)  )   
		{
			$validCharacters = "ABCDEFGHIJKLMNOPQRSTUXYVWZ1234567890";
			$validCharNumber = strlen($validCharacters);
			for ($i = 0; $i < $OE_validation_length; $i++) {
			    $index = mt_rand(0, $validCharNumber-1);
			    $validation .= $validCharacters[$index];
			}

			$query = "
				INSERT INTO core.member
				(
				    member_id,
				    member_email,
				    member_name,
				    member_password,
				    member_validation, 							    member_validated,
				    member_enabled,
				    member_created,
				    member_notes
				)
				VALUES
				(
				(SELECT MAX(member_id)+1 FROM core.member),
				'".$OEregister_form_email."',
				'".$OEregister_form_name."',
				'".$OEregister_form_pwdnew."',
				'".$validation."',
				'N',
				'N',
				current_date,
				'');
			";
			$conn = pg_connect("host=" . $OE_host . " port=" . $OE_port . " dbname=" . $OE_name . " user=" . $OE_user . " password=" . $OE_pass);
				if (!$conn) {  echo "Registration Form: database connection error!\n";  exit;}
			$cursor = pg_query($conn,$query);
				if (!$cursor) {  echo "Registration Form: insert error occurred.\n";  exit;} 
			echo '<script type="text/javascript">OEmessage("<br><b>Welcome to Open Environments!</b><br><br>You will receive an email shortly.<br>Please use its link to validate your account.<br><br>")</script>'; 
		} else {
			$OEregister_form_name_err = $_POST['OEregister_form_name_err'];
			$OEregister_form_email_err = $_POST['OEregister_form_email_err'];
			$OEregister_form_pwdnew_err = $_POST['OEregister_form_pwdnew_err'];
			$OEregister_form_pwdcon_err = $_POST['OEregister_form_pwdcon_err']; 
			echo '<script type="text/javascript">OEregister_open()</script>'; 
		}
	}
}
