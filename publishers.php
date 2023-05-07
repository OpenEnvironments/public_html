<?php

include "head.php";

?>
<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->
<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr><td width="10px"></td>
		<td>
			<?php
			$connstr = "host=" . $OEhost . " port=" . $OEport . " dbname=" . $OEname . " user=" . $OEuser . " password=" . $OEpass;
			$conn = pg_connect($connstr);
			$cursor = pg_query($conn, "select * from core.publisher");
			while ($row = pg_fetch_assoc($cursor) ){
			echo  "<a href=\"".$row['publisher_url']."\" target=\"_blank\">
					<div class=\"OEcard\">
					 	<div class=\"OEcard-publisher\">
							<div>
								<img src=\"publishers/".$row['publisher_image']."\" class=\"OEcard-publisher-image\">
								</div>
							<div class=\"OEcard-publisher-name\">".$row['publisher_name']."</div>
							<div class=\"OEcard-publisher-description\">".$row['publisher_description']."</div>
						</div>
			     	</div></a>";
			};
			?>
		</td>
		<td></td>
	</tr>
	<tr height="10px"><td colspan="3"><td></td></tr>   <!--- bottom row spacing --->
</table>
<?php

include "foot.php"

?>
