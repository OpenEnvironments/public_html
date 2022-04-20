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
			<tr><td>
			<?php 
				if(isset($_GET['v'])){
					$query = "SELECT member_id FROM core.member WHERE member_validation = '" . $_GET['v'] . "'";
					$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
					if (!$conn) {  echo "Database connection error!\n";  exit;}
					$cursor = pg_query($conn,$query);
					if (!$cursor) {  echo "An error occurred.\n";  exit;}
					$num_rows = pg_num_rows($cursor);
					if ( $num_rows > 1 ) { $response = "MULTIPLE CODES FOUND";
					} elseif ( $num_rows < 1 ) { $response = "NO MEMBERS WITH THAT CODE";
					} else { $response="Processing validation code"; $row = pg_fetch_array($cursor); $id = $row[0];};
					if($response == "Processing validation code"){
						echo "Processing validation code " . $_GET['v'] . " for member " . $row[1] . ".";
						$query = "UPDATE core.member SET member_validated='Y' WHERE member_validation = '" . $_GET['v'] . "'";
						$conn = pg_connect("host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass);
						if (!$conn) {  echo "Database connection error!\n";  exit;}
						$cursor = pg_query($conn,$query);
						if (!$cursor) {  echo "An error occurred.\n";  echo $query; exit;}
						$num_rows = pg_num_rows($cursor);
						$row = pg_fetch_array($cursor);
						echo "<script>OEmessage_open('<br>Welcome to Open Environments!<br><br>Your registration has been validated. If you have any questions, feel free to email support@openenvironments.com');</script>";
					} else {
						echo "Invalid validation code" . $_GET['v'] . "!\n";
						echo $response . "\n";};
				} else {
					echo "Missing validation code.";
				};
			?>
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
