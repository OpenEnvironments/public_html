<?php

$GLOBALS["page_id"] = basename($_SERVER['PHP_SELF']);
include "head.php";

?>

<!--------- Content Area (a 3x3 table using outer cells for spacing) ----------->
<table width="100%" class="OEcontent">
	<tr height="10px"><td colspan="3"><td></tr>  <!--- top row spacing --->
	<tr>
		<td width="10px"></td> <!--- left side spacing --->
		<td style="padding: 80px 20px 20px 80px;">
		<table><tr>
			<td style="font-size: 18px; ">
<!------------------------------------------------------------------------>
<h4>Frequently Asked Questions</h4>

<ul>
<li><a href="#publishers">Publishers, Publications, Datasets & Editions</a></li>
<li><a href="#geographies">Geographies</a></li>
<li><a href="#reference">Reference Data</a></li>
</ul>
<br><br>
<b><a id="#publishers">Publishers, Publications, Datasets & Editions</a></b>

Publishers<br>
publish Publications<br>
of Datasets<br>
each of which may have periodic updates (Editions)<br>

So<br>
the Census Bureau<br>
publishes the Decennial Census<br>
with the dataset DP02<br>
for 1990,2000,2010,2020<br>

<br><br>
<b><a id="#geographies">Geographies</a></b>

Public data is often captured around some geography.<br>
Demographics by County<br>
Employment by State<br>
Poverty by Nation<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br>
<b><a id="#reference">Reference Data</a></b>

Reference data has several familiar names<br>
“lookup” data<br>
code lists<br>
domains<br>

To structure some dataset, a field may rely on a set of valid values.<br>
To subsequently use that dataset, one needs an authoritative master list,<br>
and very often these code lists are administrated by government agencies. <br>
<br><br>
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
