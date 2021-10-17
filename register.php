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
			<td class="OEnarrative">
<!------------------------------------------------------------------------>
<h1>Welcome!</h1>
<i><b>Open Environments</b></i> respects your privacy and will not use your email in anyway.<br><br>
<br>
<br>
<!------------------------------------------------------------------------>
			</td>
		</tr></table>
		</td>
	<td style="padding: 20px 120px 20px 20px;"><!--- right side spacing ---></td>
	</tr>
	<tr height="10px"><td colspan="3"><td></tr>   <!--- bottom row spacing --->
</td></tr></table>
<?php

include "foot.php"

?>
