<?php
	/* echo "<pre>"; print_r($_POST); echo "</pre>"; */
	echo "	<script type='text/javascript' src='js/cookies.js'></script>
		<script type='text/javascript' src='js/googleanalytics.js'></script>
		<script type='text/javascript' src='js/tools.js'></script>";

	/* includes */

		include "admin/settings.php";

	/* setup security status - is the person logged in already */

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
		<link rel="stylesheet" href="css/modals.css" />
		<link rel="icon" type="image/png" href="images/oeicon154.png" sizes="any">
		<title><?= $title ?></title>
		<!--Insert OG Markup for Social Media site previews -->
			<meta prefix="og: http://ogp.me/ns#" property="og:type" content="website" />
			<meta prefix="og: http://ogp.me/ns#" property="og:title" content="Open Environments" />
			<meta prefix="og: http://ogp.me/ns#" property="og:description" content="AI for the rest of us" />
			<meta prefix="og: http://ogp.me/ns#" property="og:image" content="https://openenvironments.com/images/oesmall.png" />	
			<meta prefix="og: http://ogp.me/ns#" property="og:url" content="https://openenvironments.com" />
	</head>
<body>

<!------------   Load the javascript functions that precede HTML objects   -------->

<!------------   Cookies Policy consent needs to be established at page opening   -------->
<div w3-include-html="php	/cookienotice.html"></div> 
<script>
	let cookie_consent = getCookie("OE_cookie_consent");
	if(cookie_consent != ""){document.getElementById("cookieNotice").style.display = "none";}
	else{document.getElementById("cookieNotice").style.display = "block";}
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
						<button id="OEregister-button" class="OEregister-button">Register!</button>
					</td>
					<td width="12%" align="center">
						<a href="help.php"><img src="images/question.png" class="OEicon"></a>
					</td>
					<td width="12%" align="center">
						<a href="settings.php"><img src="images/gear.png" class="OEicon"></a>
					</td>
					<td width="12%" align="center">
						<button id="OElogin-button" class="OElogin-button">
							<img src="images/login.png" class="OEicon"></button>
						<button id="OEprofile-button" class="OEprofile-button">
							<img src="images/profile.png" class="OEicon"></button>
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

<!---- registration form ---->
<div id="OEregister-modal" class="OEmodal">
	<div id="OEregister-form" class="OEregister-form">
		<form name="OEregister" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
		 onsubmit="OEmessage_open('asds');" >
			<table style="width: 100%;">
				<tr>
					<td colspan="2" style="color: white; font-weight: bold; font-size: large"><b>&nbsp;Registration</b><br></td>
					<td align="right">
						<button id="OEregister-close" class="OEclosebutton" type="button">&times;</button>
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
						<?php echo $_POST['OEregister_form_name_err']; ?></div></td>
				</tr>
				<tr>
					<td width="30%" class="OEregister-form-labels">
						<label>Email:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="text" name="OEregister_form_email" 
						value="<?php echo $_POST['OEregister_form_email']; ?>"></td>
					<td width="40%" class="OEregister-form-errors">
						<div id="OEregister_form_email_err">
						<?php echo $_POST['OEregister_form_email_err']; ?></div></td>
				</tr>
				<tr>
					<td width="30%" class="OEregister-form-labels">
						<label>Password:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="password" name="OEregister_form_pwdnew" 
						value="<?php echo $_POST['OEregister_form_pwdnew']; ?>"></td>
					<td width="40%" class="OEregister-form-errors">
						<div id="OEregister_form_pwdnew_err">
						<?php echo $_POST['OEregister_form_pwdnew_err']; ?></div></td>
				</tr>
				<tr>
					<td width="30%" class="OEregister-form-labels">
						<label>Confirm:&nbsp;</label></td>
					<td width="30%" class="OEregister-form-inputs">
						<input type="password" name="OEregister_form_pwdcon" 
						value="<?php echo $_POST['OEregister_form_pwdcon']; ?>"></td>
					<td width="40%" class="OEregister-form-errors">
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
