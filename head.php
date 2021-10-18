<?php

include "admin/settings.php";

/* get the metadata for the current page */

$page_id = $GLOBALS["page_id"];
$query = "SELECT * FROM core.page WHERE page_id = '".$page_id."';";
$conn = pg_connect("host=" . $DB_Host . " port=" . $DB_Port . " dbname=" . $DB_Name . " user=" . $DB_User . " password=" . $DB_Pass);
if (!$conn) {  echo "Database connection error!";  exit;}
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
		<script src="js/registration.js"></script>
		<script src="js/tools.js"></script>
	</head>
<body>

<!------------   Cookies Policy consent needs to be established at page opening   -------->

<div id="cookieNotice" class="OEcookienotice"> 
	<div class='OEcookienotice_close'>
		<button type="button" class="OEcookienotice_close" onclick='closeCookieConsent();'>
		&times;</button>
	</div>
	<div class="OEcookienotice_title">Cookie Consent<br></div>
	<div class="OEcookienotice_msg">
		This website uses cookies for site analytics and to personalize your experience. 
		By continuing to use our website, you agree to our 
			<a href="privacy-policy.php">Privacy Policy</a> and 
			<a href="cookies-policy.php">Cookies Policy</a>.
	</div>
	<div class="OEcookienotice_accept">
		<button type="button" class="OEcookienotice_accept" onclick='acceptCookieConsent();'>Accept</button>
	</div>
</div>

<script>
	let cookie_consent = getCookie("OE_cookie_consent");
	if(cookie_consent != ""){
		document.getElementById("cookieNotice").style.display = "none";
	}else{
		document.getElementById("cookieNotice").style.display = "block";
        }
</script>

<!--------- Header Area ----------->
<div class="OEmodal" id="OEmodal"></div>
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
<script>
function OEregister_show() {
	document.getElementById('OEmodal').style.display = "block";		
	document.getElementById('OEregister-form').style.display = "block";
	}
function OEregister_close() {
	document.getElementById('OEmodal').style.display = "none";		
	document.getElementById('OEregister-form').style.display = "none";
	}
</script>

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$OEregister_form_name       = "hello";
$OEregister_form_email      = "";
$OEregister_form_pwdnew     = "";
$OEregister_form_pwdcon     = "";
$OEregister_form_name_err   = "";
$OEregister_form_email_err  = "";
$OEregister_form_pwdnew_err = "";
$OEregister_form_pwdcon_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	/* name processing */
	$OEregister_form_name       = test_input($_POST["OEregister_form_name"]);
	if(empty($OEregister_form_name))   {$OEregister_form_name_err   = "Name is missing";}

	/* email processing */
	$OEregister_form_email      = test_input($_POST["OEregister_form_email"]);
	$reg="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
	if((preg_match($reg, $OEregister_form_email)) ? FALSE : TRUE) {$OEregister_form_email_err = "Invalid email address.";}
	/* note - an empty emaill addr is ALSO invalid, so the empty test must follow the invalid test */
	if(empty($OEregister_form_email))  {$OEregister_form_email_err  = "Email is missing";}

	/* New password processing */
	$OEregister_form_pwdnew     = test_input($_POST["OEregister_form_pwdnew"]);
	if(empty($OEregister_form_pwdnew)) {$OEregister_form_pwdnew_err = "Password is missing";}

	/* Password confirmation processing */
	$OEregister_form_pwdcon     = test_input($_POST["OEregister_form_pwdcon"]);
	if(empty($OEregister_form_pwdcon)) {$OEregister_form_pwdcon_err = "Confirmation is missing";}


/**/ 


/* $query = "SELECT * FROM core.page WHERE page_id = '".$page_id."';";  */
/* $conn = pg_connect("host=" . $DB_Host . " port=" . $DB_Port . " dbname=" . $DB_Name . " user=" . $DB_User . " password=" . $DB_Pass);  */
/* if (!$conn) {  echo "Database connection error!";  exit;}  */
/* $cursor = pg_query($conn,$query);  */
/* if (!$cursor) {  echo "An error occurred.\n";  exit;}  */
/* $num_rows = pg_num_rows($cursor);  */
/* if ( $num_rows > 1 ) {    $title = "Open Environments - MULTIPLE PAGES FOUND";  */
/* } elseif ( $num_rows < 1 ) {    $title = "Open Environments - NO PAGES FOUND";  */
/* } else {    $row = pg_fetch_array($cursor);    $title = $row[1];};  */


}  /* if method = POST */

?>
						<button id="OEregister-button" onclick="OEregister_show()">Register!</button>
						<div id="OEregister-form" class="OEregister-form">
							<form name="OEregister-form" method="post"
							  	action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
								<table style="width: 100%;">
									<tr>
										<td colspan="2"><b>&nbsp;Registration:</b><br></td>
										<td align="right">
											<button class="OEclosebutton"
												onclick="OEregister_close()">&times;</button>
										</td>
									</tr>
									<tr>
										<td width="30%" class="OEregister-form-labels">
											<label>Your Name:&nbsp;</label></td>
										<td width="30%" class="OEregister-form-inputs">
											<input type="text" name="OEregister_form_name" 
											value="<?php echo $OEregister_form_name; ?>"></td>
										<td width="40%" class="OEregister-form-errors">
											<div id="OEregister_form_name_err">
											<?php echo $OEregister_form_name_err;?></div></td>
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
											<input type="submit" style="font_size: 20px" 
											value="&nbsp;&nbsp;Register&nbsp;&nbsp;">
											&nbsp;&nbsp;
										</td>
									</tr>
								</table>
							</form>
						</div>  <!______ registration form close _______>
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
							<button class="OEmenu-dropbtn">
							<img align="center" src="images/menu.png" class="OEicon">
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
