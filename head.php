<?php

	session_start();
	include "admin/settings.php";
	include "php/OEfunctions.php";

	/* check the session timeout condition */

	if(isset($_SESSION['OElast_action'])){
		if((time() - $_SESSION['OElast_action']) >= $OEsession_timeout_seconds){
			session_unset(); session_destroy(); }}
	$_SESSION['OElast_action'] = time();

	/* show the SESSION and POST arrays for diagnostics */
	/* echo "PRINTING SESSION OBJECT\n"; echo "SESSION:<pre>"; print_r($_SESSION); echo "</pre>"; */ 
	/* echo "PRINTING POST OBJECT\n"; echo "POST:<pre>"; print_r($_POST); echo "</pre>"; */

	/* If logged in, initialize profile form variables */
	if (isset($_SESSION['OEmember_id'])) {
		$member_id = $_SESSION['OEmember_id'];
		$member_name = $_SESSION['OEmember_name'];
		$member_email = $_SESSION['OEmember_email'];
		$member_pwdnew = $_SESSION['OEmember_password'];
		$member_pwdcon = $_SESSION['OEmember_password'];
	}

	/* get the metadata for the current page */

	$GLOBALS["page_id"] = basename($_SERVER['PHP_SELF']);
	$page_id = $GLOBALS["page_id"];
	$query = "SELECT * FROM core.page WHERE page_id = '".$page_id."'";
	$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
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
	<link rel="icon" type="image/png" href="images/oeicon32.png" sizes="any">
	<title><?= $title ?></title>

	<!--CSS -->
	<link rel="stylesheet" href="css/oe.css" />
	<link rel="stylesheet" href="css/modals.css" />

	<!--Javascript -->
	<script type='text/javascript' src='js/cookies.js'></script>
	<script type='text/javascript' src='js/googleanalytics.js'></script>
	<script type='text/javascript' src='js/tools.js'></script>

	<!-- Open Graph for Social Media -->
	<meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
	<meta prefix="og: http://ogp.me/ns#" property="og:title" content="Open Environments" />
	<meta prefix="og: http://ogp.me/ns#" property="og:description" content="AI for the rest of us" />
	<meta prefix="og: http://ogp.me/ns#" property="og:image" content="https://openenvironments.com/images/oesmall.png" />
	<meta prefix="og: http://ogp.me/ns#" property="og:url" content="https://openenvironments.com" />
</head>

<body>
<!------------   Cookies Policy consent needs to be established at page opening   -------->
<?php include "php/OEcookienotice.php" ?>
<script>
	let cookie_consent = getCookie("OEcookie_consent");
	if(cookie_consent != ""){ 
		document.getElementById("cookieNotice").style.display = "none";
	} else {
		document.getElementById("cookieNotice").style.display = "block";
	}
</script>

<!--------- Header Content ----------->

<table width="100%" class="OEheader"> 
	<tr>
		<td width="20%" rowspan="2" vertical-align="center">
			<table width="100%">
				<tr>
					<td>
						<!---  image is 746 x 232px tall -->
						<a href="index.php">
							<img src="images/oesmall.png" style="height: 65px;"></img>
						</a>
					</td>
				</tr>
			</table>
		</td>
		<td width="60%">
			<table width="100%">
				<tr>
					<td width="20%"></td>
					<td width="60%" colspan="4" class="OEquickfilter" style="  border-bottom: 1px solid #BFBFBF;">Quick Filter</td>
					<td width="20%"></td>
				</tr>
				<tr>
					<td width="20%"></td>
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
					<td width="20%"></td>
				</tr>
			</table>
		</td>
		<td width="20%"> 
			<table width="100%">
				<tr>
					<td width="28%"> 
						<div id="OElogin" class="OElogin">Log In</div>
						<div id="OElogout" class="OElogout"><a href="logout.php">Log Out</a></div>
					</td>
					<td width="72%" colspan="5">						
						<div class="OEsearch">
							<form action="/" method="GET" class="OEsearch-form">
							  <input type="search" class="OEsearch-field" size=30 >
							  <button type="submit" class="OEsearch-button">
								<img src="images/search.png"></img>
							  </button>
							</form>
						</div>
					</td>
				</tr>
				<tr>
					<td width="28%"> 
						<button id="OEregister-button" class="OEregister-button">Register!</button>
					</td>
					<td width="12%">
						<a href="help.php"><img src="images/question.png" class="OEicon"></a>
					</td>
					<td width="12%">
						<div id="OEsettings">
							<a href="settings.php"><img src="images/gear.png" class="OEicon"></a></div>
						<div id="OEsettingsgrayed">
							<img src="images/geargrayed.png" class="OEicon" style="cursor: unset;"></div>
					</td>
					<td width="12%">
						<div id="OEprofile">
							<img src="images/profile.png" class="OEicon"></div>
						<div id="OEprofilegrayed">
							<img src="images/profilegrayed.png" class="OEicon" style="cursor: unset;"></div>
					</td>
					<td width="12%">
						<div id="OEnotifications">
							<a href="notifications.php"><img src="images/bell.png" class="OEicon"></a></div>
						<div id="OEnotificationsgrayed">
							<img src="images/bellgrayed.png" class="OEicon" style="cursor: unset;"></div>
					</td>
					<td width="12%">
						<div class="OEhamburger" class="OEicon">
							<button class="OEhamburger">
							<img src="images/hamburger.png" class="OEicon"></img>
							<div class="OEhamburger-content">
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

<!---- registration form ---->
<div id="OEregister-modal" class="OEmodal">
	<div id="OEregister-form" class="OEregister-form">
		<form name="OEregister" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
		 onsubmit="return validateRegistrationForm(this);" >
			<table style="width: 100%;">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large"><b>&nbsp;Registration</b><br></td>
					<td>
						<button id="OEregister-close" class="OEclosebutton" type="button">&times;</button>
					</td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Your Name:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="text" name="OEregister_form_name" 
						value="<?php echo isset($_POST['OEregister_form_name'])?$_POST['OEregister_form_name']:''; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_name_err">
						<?php echo isset($_POST['OEregister_form_name_err'])?$_POST['OEregister_form_name_err']:''; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Email:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="text" name="OEregister_form_email" 
						value="<?php echo isset($_POST['OEregister_form_email'])?$_POST['OEregister_form_email']:''; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_email_err">
						<?php echo isset($_POST['OEregister_form_email_err'])?$_POST['OEregister_form_email_err']:''; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Password:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="password" name="OEregister_form_pwdnew" 
						value="<?php echo isset($_POST['OEregister_form_pwdnew'])?$_POST['OEregister_form_pwdnew']:''; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_pwdnew_err">
						<?php echo isset($_POST['OEregister_form_pwdnew_err'])?$_POST['OEregister_form_pwdnew_err']:''; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Confirm:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="password" name="OEregister_form_pwdcon" 
						value="<?php echo isset($_POST['OEregister_form_pwdcon'])?$_POST['OEregister_form_pwdcon']:''; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_pwdcon_err">
						<?php echo isset($_POST['OEregister_form_pwdcon_err'])?$_POST['OEregister_form_pwdcon_err']:''; ?></div></td>
				</tr>
				<tr><td colspan="3"> </td></tr>
				<tr>
					<td></td>
					<td style="text-align: center; vertical-align: middle;"><input type="submit" name="submit" class="OEsubmitbutton" value="Register"></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div> 
</div>  <!---- registration form ---->

<!---- profile form ---->

<div id="OEprofile-modal" class="OEmodal">
	<div id="OEprofile-form" class="OEprofile-form">
		<form name="OEprofile" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
		 onsubmit="return validateProfileForm(this);" >
			<table style="width: 100%;">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large"><b>&nbsp;Profile</b><br></td>
					<td>
						<button id="OEprofile-close" class="OEclosebutton" type="button">&times;</button>
					</td>
				</tr>
				<tr>
					<td width="20%" class="OEprofile-form-labels">
						<label>Your Name:&nbsp;</label></td>
					<td width="30%" class="OEprofile-form-inputs">
						<input type="text" name="OEprofile_form_name" 
						value="<?php echo isset($_POST['OEprofile_form_name']) ? $_POST['OEprofile_form_name']:$member_name; ?>">
						</td>
					<td width="50%" class="OEprofile-form-errors">
						<div id="OEprofile_form_name_err">
						<?php echo isset($_POST['OEprofile_form_name_err']) ? $_POST['OEprofile_form_name_err']:''; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEprofile-form-labels">
						<label>Email:&nbsp;</label></td>
					<td width="30%" class="OEprofile-form-inputs">
						<input type="text" name="OEprofile_form_email" 
						value="<?php echo isset($_POST['OEprofile_form_email'])?$_POST['OEprofile_form_email']:$member_email; ?>">
					<td width="50%" class="OEprofile-form-errors">
						<div id="OEprofile_form_email_err">
						<?php echo isset($_POST['OEprofile_form_email_err']) ? $_POST['OEprofile_form_email_err']:''; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEprofile-form-labels">
						<label>Password:&nbsp;</label></td>
					<td width="30%" class="OEprofile-form-inputs">
						<input type="password" name="OEprofile_form_pwdnew" 
						value="<?php echo isset($_POST['OEprofile_form_pwdnew'])?$_POST['OEprofile_form_pwdnew']:$member_pwdnew; ?>">
					<td width="50%" class="OEprofile-form-errors">
						<div id="OEprofile_form_pwdnew_err">
						<?php echo isset($_POST['OEprofile_form_pwdnew_err']) ? $_POST['OEprofile_form_pwdnew_err']:''; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEprofile-form-labels">
						<label>Confirm:&nbsp;</label></td>
					<td width="30%" class="OEprofile-form-inputs">
						<input type="password" name="OEprofile_form_pwdcon" 
						value="<?php echo isset($_POST['OEprofile_form_pwdcon'])?$_POST['OEprofile_form_pwdcon']:$member_pwdcon; ?>">
					<td width="50%" class="OEprofile-form-errors">
						<div id="OEprofile_form_pwdcon_err">
						<?php isset($_POST['OEprofile_form_pwdcon_err']) ? $_POST['OEprofile_form_pwdcon_err']:''; ?></div></td>
				</tr>
				<tr><td colspan="3"> </td></tr>
				<tr>
					<td></td>
					<td style="text-align: center; vertical-align: middle;"><input type="submit" name="submit" class="OEsubmitbutton" value="Profile"></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div> 
</div>  <!---- change form ---->

<!---- login form ---->
<div id="OElogin-modal" class="OEmodal">
	<div id="OElogin-form" class="OElogin-form">
		<form name="OElogin" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
			onsubmit="return validateLoginForm(this);" >
			<table style="width: 100%;">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large;"><b>&nbsp;Log in</b><br></td>
					<td>
						<button id="OElogin-close" class="OEclosebutton" type="button">&times;</button>
					</td>
				</tr>
				<tr>
					<td width="30%" class="OElogin-form-labels">
						<label>Email:&nbsp;</label></td>
					<td width="30%" class="OElogin-form-inputs">
						<input type="text" name="OElogin_form_email" 
						value="<?php echo (isset($_POST['OElogin_form_email'])?$_POST['OElogin_form_email']:''); ?>"></td>
					<td width="40%" class="OElogin-form-errors">
						<div id="OElogin_form_email_err">
						<?php echo isset($_POST['OElogin_form_email_err'])?$_POST['OElogin_form_email_err']:''; ?></div></td>
				</tr>
				<tr>
					<td width="30%" class="OElogin-form-labels">
						<label>Password:&nbsp;</label></td>
					<td width="30%" class="OElogin-form-inputs">
						<input type="password" name="OElogin_form_pass" 
						value="<?php echo (isset($_POST['OElogin_form_pass'])?$_POST['OElogin_form_pass']:''); ?>"></td>
					<td width="40%" class="OElogin-form-errors">
						<div id="OElogin_form_pass_err">
						<?php echo isset($_POST['OElogin_form_pass_err'])?$_POST['OElogin_form_pass_err']:''; ?></div></td>
				</tr>
				<tr><td colspan="3"> </td></tr>
				<tr>
					<td></td>
					<td style="text-align: center; vertical-align: middle;"><input type="submit" name="submit" class="OEsubmitbutton" value="Login"></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div> 
</div> <!---- login form ---->

<div id="OEmessage" class="OEmodal">
	<div id="OEmessage-form" class="OEmessage-form">
		<form name="OEmessage" method="post">
			<table style="width: 100%;">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large;"><b>&nbsp;Message</b><br></td>
					<td>
						<button id="OEmessage-close" class="OEclosebutton">&times;</button>
					</td>
				</tr>
				<tr>
					<td width="10%"></td>
					<td width="80%">
						<div id="OEmessage-content" class="OEmessage-content">
						</div>
					</td>
					<td width="10%"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center;">
						<input type="submit" name="submit" class="OEsubmitbutton" value="OK" onclick="window.location.href='/index.php'" data-dismiss="modal">
					</td>
				</tr>
			</table>
		</form>
	</div> 
</div>  <!---- message modal ---->

<?php
