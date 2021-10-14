<?php

$GLOBALS["page_id"] = basename($_SERVER['PHP_SELF']);
include "head.php";

?>
<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->
<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr><td width="10px"></td>
		<td>
			<?php
			$connstr = "host=" . $DB_Host . " port=" . $DB_Port . " dbname=" . $DB_Name . " user=" . $DB_User . " password=" . $DB_Pass;
			$conn = pg_connect($connstr);
			$cursor = pg_query("select * from core.publisher");
			while ($row = pg_fetch_assoc($cursor) ){
			echo "<div class=\"OEcard\">
				<div class=\"OEcard-container\">
			 	  <div class=\"OEcard-publisher\"
					<div class=\"OEcard-publisher-image\">
						<img src=\"publishers/".$row['publisher_image']."\" class=\"OEcard-publisher-image\"></div>
					<div class=\"OEcard-publisher-name\"><h4><b>".$row['publisher_name']."</b></h4></div>
					<div class=\"OEcard-publisher-notice\"><b>".$row['publisher_notice']."</b></div>
				  </div>
				</div>
			     </div>";
			};
			?>
		</td><td></td>
	</tr>
	<tr height="10px"><td colspan="3"><td></tr>   <!--- bottom row spacing --->
</td></tr></table>
<?php

include "foot.php"

?>
