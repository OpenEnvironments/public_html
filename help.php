<?php

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
<h1>Frequently Asked Questions</h1>
<div>
<ul>
<li><a href="#publishers">Publishers, Publications, Datasets & Editions</a></li>
<li><a href="#reference">Reference Data (Codes!)</a></li>
<li><a href="#subjects">Subjects</a></li>
<li><a href="#models">Models</a></li>
<li><a href="#geographies">Geographies</a></li>
</ul>
<br><br>
If you don't see an answer here, you can still reach us by email at <a href="mailto:support@openenvironments.com">support@openenvironments.com</a>
<br>
</div>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
_______________________________________________________________________________<br>
<br>
<div id="publishers" class="OEnarrative" style="width:100%;"><b>Publishers, Publications, Datasets & Vintages</b><br><br>
Publishers publish publications with datasets periodically in vintages.<br>
<table>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td></td><td><b>like ... </b></td>
    </tr>
    <tr>
        <td></td><td><b>Publisher:</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;Census Bureau</td>
    <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;issue <b>Publication:</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;Decennial Survey</td>
    </tr>
    <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of <b>Dataset:</b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;(DP02) Selected Social Characteristics</td> 
    </tr>
    <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;over time <b>Vintage:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;(DP02) Selected Social Characteristics for <u>1990, 2010, 2020</u></td>
    </tr>
</table><br><br>
</div>
<br><br><br>
_______________________________________________________________________________<br>
<br>
<div id="subjects" class="OEnarrative" style="width:100%;"><b>Subjects</b><br><br>
Subjects allow us to categorize Publications, Datasets and Models so they can be searched and compared.
<br><br>
Subjects might include:
<ul>
<li>Consumers</li>
<li>Geographies</li>
<li>Economics</li>
<li>Politics</li>
<li>Financial Markets</li>
</ul>
</div>
<br><br><br>
_______________________________________________________________________________<br>
<br>
<div id="models" class="OEnarrative" style="width:100%;"><b>Models</b><br><br>
Open Environments applies machine learning methods to estimate or project new datasets.<br>
A <b>model</b> is like a data publication that is calculated rather than representing an originally collected dataset.
<br><br>
Open Environments first models include:
<ul>
<li>Projecting election results from voting precincts on to geographies of the American Community Survey</li>
<li>Using BLS Consumer Expenditure microdata to estimate spending for each Census block group</li>
<li>Casting the CDC's Social Vulneratibility index from the Census tract level down to lower levels</li>
<li>Merging TIGER/Line shapes with select ACS demographic results</li>
</ul>
Models can be found on this website linked to the Open Environments service on Harvard University's dataverse platform. 
<br><br>
</div>
<br><br><br>
_______________________________________________________________________________<br>
<br>
<div id="reference" class="OEnarrative" width="100%"><b>Reference Data (Codes!)</b><br><br>
To structure some dataset, a field may rely on a set of valid values.<br>
To use that dataset, you will needs an authoritative master list of those codes with a description of each.<br>
Very often these code lists are administrated by government agencies.<br>
<br>
For example, 
<ul>
<li>Data with the FIPS County Code "019" and FIPS State Code "04" refers to Pima County, Arizona.</li>
<li>Companies that provide NAPCS code "67119010202" are selling hay.</li>
<li>If your doctor's visit is coded W61.62XD, you've had a followup visit after being attacked by a duck.</li>
<li>There are nine codes for varieties of the Portugese language.</li>
</ul>
</div>
<br><br><br>
_______________________________________________________________________________<br>
<br>
<div id="geographies" class="OEnarrative" width="100%"><b>Geographies</b><br><br>
Public data is often captured around some geography. This is valuable for visualizing on a map.<br>
In machine learning, you can add a person's geographic attributes to the properties input to the model.
In marketing terms, You Are Where You Live (YAWYL) analysis would associate your propensities with the data about your geography. 
For example, an alumni's likelihood to donate might be affected by their zip code's income distribution.<br>
<ul>
<li>Population Density of the person's Zip Code</li>
<li>Age of the person's County</li>
<li>Unemployment Rate of the person's State</li>
<li>Poverty Rate of the person's Nation</li>
</ul>
</div>
<br><br><br>
_______________________________________________________________________________<br>
<br>

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
