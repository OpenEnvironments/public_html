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
			$connstr = "host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass;
			$conn = pg_connect($connstr);
			$cursor = pg_query($conn, "select * from core.publication child, core.publisher mom where child.publisher_publisher_id=mom.publisher_id");
			if (!$cursor) {    echo "A database error occurred.\n";    exit;}
			while ($row = pg_fetch_assoc($cursor) ){
			echo "<a href=\"".$row['publication_url']."\" target=\"_blank\"><div class=\"OEcard\">
					<div class=\"OEcard-publication\">
						<div class=\"OEcard-publication-publisher-image\" >
							<img src=\"publishers/".$row['publisher_image']."\" class=\"OEcard-publication-publisher-image\"></div>
						<div class=\"OEcard-publication-name\">
							(".$row['publication_id'].") ".$row['publication_name']."</div>
					</div>
			    </div></a>";
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
