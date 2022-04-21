<?php

$GLOBALS["page_id"] = basename($_SERVER['PHP_SELF']);
include "head.php";

?>

<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->

<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr>
		<td width="10px"></td> <!--- left side spacing --->
		<td style="padding: 20px 20px 20px 80px;">
		<table><tr>
    			<td style="font-size: 18px; ">
<!------------------------------------------------------------------------>
				</td>
			<tr><td><br><br><br><br><br>
			<?php 
				if(isset($_GET['v'])){
					$query = "SELECT * FROM core.member WHERE member_validation = '" . $_GET['v'] . "'";
					$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
					if (!$conn) {  echo "Database connection error!\n";  exit;}
					$cursor = pg_query($conn,$query);
					if (!$cursor) {  echo "An error occurred.\n";  exit;}
					$num_rows = pg_num_rows($cursor);
					if ( $num_rows > 1 ) { 
						echo "<b>Welcome to Open Environments!</b><br><br>" . 
						"___________________________________________________________________<br><br>" . 
						"Multiple members were found for validation code: " . $_GET['v'] . "!<br>" .
						"___________________________________________________________________<br>" . 
						"<br><br>Please feel free to email support@openenvironments.com";
					} elseif ( $num_rows < 1 ) { 
						echo "<b>Welcome to Open Environments!</b><br><br>" . 
						"___________________________________________________________________<br><br>" . 
						"No member was found for validation code: " . $_GET['v']  . "!<br>" .
						"___________________________________________________________________<br>" . 
						"<br><br>Please feel free to email support@openenvironments.com";
					} else {
						$row = pg_fetch_array($cursor); $id = $row[0]; $mem = $row[1];
						$query = "UPDATE core.member SET member_validated='Y' WHERE member_validation = '" . $_GET['v'] . "'";
						$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
						if (!$conn) {  echo "Database connection error!\n";  exit;}
						$cursor = pg_query($conn,$query);
						if (!$cursor) {  echo "An error occurred.\n";  echo $query; exit;}
						$num_rows = pg_num_rows($cursor);
						$row = pg_fetch_array($cursor);
						echo "<b>Welcome to Open Environments!</b><br><br>" . 
					        	"___________________________________________________________________<br><br>" . 
								"Thank you for validating " . $mem . "!<br>"; 
					        	"___________________________________________________________________<br>" ; 
						}
				} else {
					echo "<b>Welcome to Open Environments!</b><br><br>" . 
					"___________________________________________________________________<br><br>" . 
					"This page is used to validate member registration.<br>" . 
					"No validation code was provided!<br>" .
					"___________________________________________________________________<br>" . 
					"<br><br>Please feel free to email support@openenvironments.com";
	};
			?>
			<br><br><br><br><br><br><br>
<!------------------------------------------------------------------------>
			</td>
		</tr></table>
		</td>
	<td style="padding: 20px 120px 20px 20px;"><!--- right side spacing ---></td>
	</tr>
	<tr height="10px"><td colspan="3"><td></tr>   <!--- bottom row spacing --->
</td></tr></table>
</span>
<?php

include "foot.php"

?>
