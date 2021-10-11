<?php

$GLOBALS["page_id"] = basename($_SERVER['PHP_SELF']);
include "head.php";

?>

<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->
<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr><td width="10px"></td> <!--- left side spacing --->
		<td style="padding: 20px 20pc 20px 80px;" class="OEnarrative">
<!-------------------------------------------------------------->
<b><i>Open Environments</i></b> provides its members:<br>
	<ul>
		<li>simplified access to Open Sourced and Public Datasets</li>
		<li>authoritative reference data with codes and descriptions</li>
		<li>analytic services to support modelling against these data resources</li>
	</ul>
<br>
We welcome all:<br>
	<ul>
		<li>Subscribers with their subjects of interest.
		<li>Addition or modification requests for our curators.
		<li>Alerts to data quality issues or concerns
	</ul>
If you have interest in speaking to a curator, feel free to contact us by email to 
<a href="mailto:support@openenvironments.com?subject=Curator Request">support@openenvironments.com</a>

<!-------------------------------------------------------------->
		</td>
	<td></td><!--- right side spacing --->
	</tr>
	<tr height="10px"><td colspan="3"><td></tr>   <!--- bottom row spacing --->
</td></tr></table>
<?php

include "foot.php"

?>
