<?php

include "admin/settings.php";

$page_ID = basename($_SERVER['PHP_SELF']);
$query = "SELECT * FROM core.page WHERE page_id = '".$page_ID."';";
$conn = pg_connect("host=" . $DB_Host . " port=" . $DB_Port . " dbname=" . $DB_Name . " user=" . $DB_User . " password=" . $DB_Pass);
if (!$conn) {
  echo "Database connection error!";
  exit;
}
$cursor = pg_query($conn,$query);
if (!$cursor) {
  echo "An error occurred.\n";
  exit;
}
$num_rows = pg_num_rows($cursor);
if ( $num_rows > 1 ) {
    $title = "Open Environments - MULTIPLE PAGES FOUND";
} elseif ( $num_rows < 1 ) {
    $title = "Open Environments - NO PAGES FOUND";
} else {
    $row = pg_fetch_array($cursor);
    $title = $row[1];
};
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="oe.css" />
		<link rel="icon" type="image/png" href="images/oeicon154.png" sizes="any">
		<title><?= $title ?></title>
	</head>
<body>

<!--------- Header Area ----------->
<table width="100%" class="OEheader"> 
	<tr>
		<td width="20%" rowspan="2" vertical-align="center">
			<table width="100%">
				<tr>
					<td>
						<!---  image is 746 x 232px tall -->
						<img src="images/oesmall.png" style="height: 65px;"></img>
					</td>
				</tr>
			</table>
		</td>
		<td width="65%">
			<table width="100%">
				<tr><td></td></tr>
			</table>
		</td>
		<td width="15%"> 
			<table width="100%">
				<tr>
					<td></td>
					<td width="100%" colspan="5">
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
					<td> 
						<div  class="register">
						<p><a href="register.php" style="text-decoration: none; color: white;">
							&nbsp;<b>Register!</b>&nbsp;
						</a></p></div>
					</td>
					<td width="15%" align="center">
						<a href="settings.php"><img src="images/gear.png" class="OEicon"></a>
					</td>
					<td width="15%" align="center">
						<a href="profile.php"><img src="images/profile.png" class="OEicon"></a>
					</td>
					<td width="15%" align="center">
						<a href="bell.php"><img src="images/bell.png" class="OEicon"></a>
					</td>
					<td width="15%" align="center">
						<a href="cart.php"><img src="images/cart.png" class="OEicon"></a>
					</td>
					<td width="15%" align="center">
						<div class="OEmenu">
							<button class="OEmenu-dropbtn">
							<img align="center" src="images/menu.png" class="OEicon">
							<div class="OEmenu-content">
								<a href="about.php">About</a>
								<a href="privacy.php">Privacy</a>
								<a href="contributors.php">Contributors</a>
								<a href="careers.php">Careers</a>
								<a href="contact">Contact</a>
							</div>
							</button>
						</div>
 					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
