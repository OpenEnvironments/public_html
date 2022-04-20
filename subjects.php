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
			<td width="5%"><img src="images/subject.png" style="width=180px; height: 180px;"><br><br><br><br></td>
			<td class="OEnarrative">
			<center><h1>Subjects are categories of data to which you may subscribe.</h1></center>
<div style="margin-left: 240px; width=100%">
Examples of <b>Subjects</b> will include:
<ul>
<li>Population</li>
<li>Geographies</li>
<li>Economics</li>
<li>Politics</li>
</ul>
</div><br><br><br><br><br><br><br><br>
<center><b>Coming soon!</b><br><br>( if you need anything, mail us at <a href="mailto:support@openenvironments.com?subject=Settings Request">support@openenvironments.com )</a> <br>
				<center><br><br><br><br>
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
