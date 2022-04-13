<?php

/* echo "SESSION:<pre>"; print_r($_SESSION); echo "</pre>";  */

		session_start();
		include "admin/settings.php";

		if(isset($_SESSION['OElast_action'])){
			if((time() - $_SESSION['OElast_action']) >= $OEsession_timeout_seconds){
				session_unset(); session_destroy(); }}
		$_SESSION['OElast_action'] = time();

	/* get the metadata for the current page */

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
	<link rel="icon" type="image/png" href="images/oeicon154.png" sizes="any">
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
<?php include "cookienotice.php" ?>
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
					<td colspan="4" class="OEquickfilter" style="font-size: small; border-bottom: 1px solid #BFBFBF;">Quick Filter</td>
					<td width="20%"></td>
				</tr>
				<tr>
					<td width="20%"></td>
					<td width="15%" class="OEquickfilter-item" style="font-size: small">
						<a href="publishers.php">Publishers</a>
					</td>
					<td width="15%" class="OEquickfilter-item" style="font-size: small">
						<a href="publications.php">Publications</a>
					</td>
					<td width="15%" class="OEquickfilter-item" style="font-size: small">
						<a href="subjects.php">Subjects</a>
					</td>
					<td width="15%" class="OEquickfilter-item" style="font-size: small">
						<a href="models.php">Models</a>
					</td>
					<td width="20%"></td>
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
						<a href="settings.php"><img src="images/gear.png" class="OEicon"></a>
					</td>
					<td width="12%">
						<div id="OElogin-button" class="OEicon"><img src="images/login.png" class="OEicon"></div>
						<div id="OEprofile" class="OEprofile"></div>
						<?php
							if (isset($_SESSION['member_name'])) {
								echo "<script>
									document.getElementById('OElogin-button').style.display = 'none';
									document.getElementById('OEprofile').style.display = 'block';
									document.getElementById('OEprofile').innerHTML = '"  . 
										strtoupper(substr($_SESSION['member_name'],0,1)) . "';</script>";
							} else {
								echo "<script>
									document.getElementById('OElogin-button').style.display = 'block';
									document.getElementById('OEprofile').style.display = 'none';
								</script>";
							}
						?>
					</td>
					<td width="12%">
						<a href="notifications.php"><img src="images/bell.png" class="OEicon"></a>
					</td>
					<td width="12%">
						<a href="cart.php"><img src="images/cart.png" class="OEicon"></a>
					</td>
					<td width="12%">
						<div class="OEhamburger">
							<button class="OEhamburger">
							<img align="center" src="images/hamburger.png" class="OEicon""></img>
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
		<form name="OEregister" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
		 onsubmit="return validateRegistrationForm(this);" >
			<table style="width: 100%;">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large"><b>&nbsp;Registration</b><br></td>
					<td align="right">
						<button id="OEregister-close" class="OEclosebutton" type="button">&times;</button>
					</td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Your Name:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="text" name="OEregister_form_name" 
						value="<?php echo $_POST['OEregister_form_name']; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_name_err">
						<?php echo $_POST['OEregister_form_name_err']; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Email:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="text" name="OEregister_form_email" 
						value="<?php echo $_POST['OEregister_form_email']; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_email_err">
						<?php echo $_POST['OEregister_form_email_err']; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Password:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="password" name="OEregister_form_pwdnew" 
						value="<?php echo $_POST['OEregister_form_pwdnew']; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_pwdnew_err">
						<?php echo $_POST['OEregister_form_pwdnew_err']; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEregister-form-labels">
						<label>Confirm:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="password" name="OEregister_form_pwdcon" 
						value="<?php echo $_POST['OEregister_form_pwdcon']; ?>"></td>
					<td width="50%" class="OEregister-form-errors">
						<div id="OEregister_form_pwdcon_err">
						<?php echo $_POST['OEregister_form_pwdcon_err']; ?></div></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td align="right">
						<input type="submit" name="submit" class="OEsubmitbutton"							 
							value="Register">&nbsp;&nbsp;
					</td>
				</tr>
			</table>
		</form>
	</div> 
</div>  <!---- registration form ---->

<!---- change form ---->
<div id="OEchange-modal" class="OEmodal">
	<div id="OEchange-form" class="OEchange-form">
		<form name="OEchange" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
		 onsubmit="return validateChangeForm(this);" >
			<table style="width: 100%;">
				<input type="hidden" name="OEmember_id" value="<?php echo $OEchange_form_id; ?>">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large"><b>&nbsp;Change</b><br></td>
					<td align="right">
						<button id="OEchange-close" class="OEclosebutton" type="button">&times;</button>
					</td>
				</tr>
				<tr>
					<td width="20%" class="OEchange-form-labels">
						<label>Your Name:&nbsp;</label></td>
					<td width="30%" class="OEchange-form-inputs">
						<input type="text" name="OEchange_form_name" 
						value="<?php echo $_POST['OEchange_form_name']; ?>"></td>
					<td width="50%" class="OEchange-form-errors">
						<div id="OEchange_form_name_err">
						<?php echo $_POST['OEchange_form_name_err']; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEchange-form-labels">
						<label>Email:&nbsp;</label></td>
					<td width="30%" class="OEchange-form-inputs">
						<input type="text" name="OEchange_form_email" 
						value="<?php echo $_POST['OEchange_form_email']; ?>"></td>
					<td width="50%" class="OEchange-form-errors">
						<div id="OEchange_form_email_err">
						<?php echo $_POST['OEchange_form_email_err']; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEchange-form-labels">
						<label>Password:&nbsp;</label></td>
					<td width="30%" class="OEchange-form-inputs">
						<input type="password" name="OEchange_form_pwdnew" 
						value="<?php echo $_POST['OEchange_form_pwdnew']; ?>"></td>
					<td width="50%" class="OEchange-form-errors">
						<div id="OEchange_form_pwdnew_err">
						<?php echo $_POST['OEchange_form_pwdnew_err']; ?></div></td>
				</tr>
				<tr>
					<td width="20%" class="OEchange-form-labels">
						<label>Confirm:&nbsp;</label></td>
					<td width="30%" class="OEchange-form-inputs">
						<input type="password" name="OEchange_form_pwdcon" 
						value="<?php echo $_POST['OEchange_form_pwdcon']; ?>"></td>
					<td width="50%" class="OEchange-form-errors">
						<div id="OEchange_form_pwdcon_err">
						<?php echo $_POST['OEchange_form_pwdcon_err']; ?></div></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td align="right">
						<input type="submit" name="submit" class="OEsubmitbutton"							 
							value="Change">&nbsp;&nbsp;
					</td>
				</tr>
			</table>
		</form>
	</div> 
</div>  <!---- change form ---->

<!---- login form ---->
<div id="OElogin-modal" class="OEmodal">
	<div id="OElogin-form" class="OElogin-form">
		<form name="OElogin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
			onsubmit="return validateLoginForm(this);" >
			<table style="width: 100%;">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large;"><b>&nbsp;Login</b><br></td>
					<td align="right">
						<button id="OElogin-close" class="OEclosebutton" type="button">&times;</button>
					</td>
				</tr>
				<tr>
					<td width="30%" class="OElogin-form-labels">
						<label>Email:&nbsp;</label></td>
					<td width="30%" class="OElogin-form-inputs">
						<input type="text" name="OElogin_form_email" 
						value="<?php echo $_POST['OElogin_form_email']; ?>"></td>
					<td width="40%" class="OElogin-form-errors">
						<div id="OElogin_form_email_err">
						<?php echo $_POST['OElogin_form_email_err']; ?></div></td>
				</tr>
				<tr>
					<td width="30%" class="OElogin-form-labels">
						<label>Password:&nbsp;</label></td>
					<td width="30%" class="OElogin-form-inputs">
						<input type="password" name="OElogin_form_pass" 
						value="<?php echo $_POST['OElogin_form_pass']; ?>"></td>
					<td width="40%" class="OElogin-form-errors">
						<div id="OElogin_form_pass_err">
						<?php echo $_POST['OElogin_form_pass_err']; ?></div></td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td colspan="3" align="center">
						<input type="submit" name="submit" class="OEsubmitbutton" value="Login">
					</td>
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
					<td align="right">
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
					<td colspan="3" align="center">
						<input type="submit" name="submit" class="OEsubmitbutton" value="OK">
					</td>
				</tr>
			</table>
		</form>
	</div> 
</div>  <!---- message modal ---->


<?php
