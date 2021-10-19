<?php

$GLOBALS["page_id"] = basename($_SERVER['PHP_SELF']);
include "head.php";

?>
<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->
<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr>
		<td width="10px"></td> <!-- left column -->
		<td>
			<?php
			$connstr = "host=" . $DB_Host . " port=" . $DB_Port . " dbname=" . $DB_Name . " user=" . $DB_User . " password=" . $DB_Pass;
			$conn = pg_connect($connstr);
			$cursor = pg_query($conn, "SELECT * FROM core.publication");
			if (!$cursor) {    echo "A database error occurred.\n";    exit;}
			while ($row = pg_fetch_assoc($cursor) ){
			echo "<div class=\"OEcard\">
				<div class=\"OEcard-container\">
			 	  <div class=\"OEcard-publication\"
					<div class=\"OEcard-publication-name\">
						<h4>(".$row['publication_id'].") ".$row['publication_name']."</h4></div><br>
					<div class=\"OEcard-publication-url\"><a href=\"".$row['publication_url']."\">".$row['publication_url']."</a></div>
				  </div>
				</div>
			     </div>";
			};
			?>
		</td>
		<td></td> <!-- right column -->
	</tr>
	<tr height="10px"><td colspan="3"><td></td></tr>   <!--- bottom row spacing --->
</table>
<?php

include "foot.php"

?>
