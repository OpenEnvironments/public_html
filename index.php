<?

include 'admin/settings.php';
// include 'head.php';

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="oe.css" />
		<link rel="icon" type="image/png" href="images/oeicon154.png" sizes="any">
		<title>Open Environments</title>
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
					<td width="100%" colspan="4">
						<div>
							<form action="/" method="GET" class="OEsearch-form">
							  <input type="search" class="OEsearch-field" />
							  <button type="submit" class="OEsearch-button">
								<img src="images/search.png">
							  </button>
							</form>
						</div>
					</td>
				</tr>
				<tr>
					<td width="25%" align="center">
						<a href="settings.php"><img src="images/gear.png" class="OEicon"></a>
					</td>
					<td width="25%" align="center">
						<a href="profile.php"><img src="images/profile.png" class="OEicon"></a>
					</td>
					<td width="25%" align="center">
						<a href="bell.php"><img src="images/bell.png" class="OEicon"></a>
					</td>
					<td width="25%" align="center">
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

<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->
<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr><td width="10px"></td>
		<td>
			<div class="OEcard">
			<div class="OEcard-container">
					<img src="publishers/trend.png" class="OEcard-container-image">
					<h4><b>COVID Hospitalizations</b></h4>
				</div>
			</div>
			<div class="OEcard">
				<div class="OEcard-container">
					<img src="publishers/census.png" class="OEcard-container-image">
					<h4><b>2020 Census 1yr Estimates</b></h4>
				</div>
			</div>
			<div class="OEcard">
				<div class="OEcard-container">
					<img src="publishers/federalreserve.png" class="OEcard-container-image">
					<h4><b>Consumer Price Indexes</b></h4>
				</div>
			</div>
			<div class="OEcard">
				<div class="OEcard-container">
					<img src="publishers/census.png" class="OEcard-container-image">
					<h4><b>Postal Geography</b></h4>
				</div>
			</div>
		</td><td></td>
	</tr>
	<tr height="10px"><td colspan="3"><td></tr>   <!--- bottom row spacing --->
</td></tr></table>

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


</body>
</html>