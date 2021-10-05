<?php

$GLOBALS["page_id"] = basename($_SERVER['PHP_SELF']);
include "head.php";

?>

<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->
<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr><td width="10px"></td> <!--- left side spacing --->
		<td style="padding: 20px 20pc 20px 80px;">
<p class=OEnarrative>
<b><i>Open Environments</i></b> provides its members:<br></p>
	<ul>
		<li><p class=OEnarrative>simplified access to Open Sourced and Public Datasets</li></p>
		<li><p class=OEnarrative>authoritative reference data with codes and descriptions</li></p>
		<li><p class=OEnarrative>analytic services to support modelling against these data resources</li></p>
	</ul>
<hr>
<br>
<p class=OEnarrative>We welcome all:<br></p>
	<ul>
		<li><p class=OEnarrative>Subscribers with their subjects of interest.</p>
		<li><p class=OEnarrative>Addition or modification requests for our curators.</p>
		<li><p class=OEnarrative>Alerts to data quality issues or concerns</p>
	</ul>
<p class=OEnarrative>If you have interest in speaking to a curator, feel free to contact us by email to 
<a href="mailto:support@openenvironments.com?subject=Curator Request">support@openenvironments.com</a></p>
	</td>
    </tr>
<br>
<hr>
<br>
		</td>
	<td></td><!--- right side spacing --->
	</tr>
	<tr height="10px"><td colspan="3"><td></tr>   <!--- bottom row spacing --->
</td></tr></table>
<?php

include "foot.php"

?>
