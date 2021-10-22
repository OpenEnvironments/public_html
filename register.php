<?

include 'admin/settings.php';
include 'includes/data_functions.php';

$mode = Get_Field("mode");

if ($mode == "save") {
	mysql_connect($DB_HostName,$DB_UserName,$DB_Password) or die("Unable to connect to host $DB_HostName");
	mysql_select_db($DB_Name) or die("Unable to select database $DB_Name");
	
	$Record_Query = mysql_query("SELECT * FROM members WHERE Member_Email = '" . Prep_Data($_POST[F_Member_Email]) . "'");
	$Record_Count = mysql_affected_rows();
	
	mysql_close();
	
	if ($Record_Count > 0) {
		$Redirect = "Location: " . $Site_Root . "login_error.php?code=4";
		header($Redirect);
		exit;
	} else {
		mysql_connect($DB_HostName,$DB_UserName,$DB_Password) or die("Unable to connect to host $DB_HostName");
		mysql_select_db($DB_Name) or die("Unable to select database $DB_Name");
		
		$Query  = "INSERT INTO members VALUES(0, '" . Prep_Data($_POST[F_Member_Email]) . "','" . Prep_Data($_POST[F_Member_Password]) . "','0','0','" . date("Y-m-d") . "','" . date("Y-m-d") . "','" . Prep_Data($_POST[F_Member_Organization]) . "','" . Prep_Data($_POST[F_Member_First_Name]) . "','" . Prep_Data($_POST[F_Member_Last_Name]) . "','" . Prep_Data($_POST[F_Member_Address]) . "','" . Prep_Data($_POST[F_Member_City]) . "','" . Prep_Data($_POST[F_Member_State]) . "','" . Prep_Data($_POST[F_Member_Zipcode]) . "','" . Prep_Data($_POST[F_Member_Country]) . "','','')";
		$Result = mysql_query($Query);
		$ID     =  mysql_insert_id();
		
		$Key_Count = 1;
		
		while ($Key_Count <> 0) {
			$Code_Chars   = "abcdefghijklmnopqrstuvwxyz0123456789";
			$Code_Length  = 20;
			$Random_Code  = "";
			
			$Code_Char_Length = strlen($Code_Chars)-1;
	
			for ($i=0;$i<=$Code_Length;$i++) {
			  $Random_Code .= substr($Code_Chars, rand(0, $Code_Char_Length), 1);
			}
		
			$Validate_Code = $Random_Code;
			
			$Key_Query  = "SELECT COUNT(Validate_ID) FROM validate WHERE Validate_Code = '" . addslashes($Validate_Code) . "'";
			$Key_Result = mysql_query($Key_Query);
			$Key_Count  = mysql_result($Key_Result,0);
		}
		
		$Query  = "INSERT INTO validate VALUES(0, '" . $ID . "','" . $Validate_Code . "')";
		$Result = mysql_query($Query);
		
		mysql_close();
		
		
		// Redirect to Validation Mail Send Routine (kept seperate so email resends can be easily requested)
		
		$Redirect = "Location: " . $Site_Root . "validate.php?ID=" . $ID;
		header($Redirect);
		exit;
	}
}

if (!$mode) {
	include 'head.php';
	
	echo $Content_Data;
	
	mysql_connect($DB_HostName,$DB_UserName,$DB_Password) or die("Unable to connect to host $DB_HostName");
	mysql_select_db($DB_Name) or die("Unable to select database $DB_Name");
	
	$Country_Records = mysql_query("SELECT * FROM country ORDER BY Country_Name");
	$Country_Drop    = '<select name="F_Member_Country" style="width:100%;">';
	
	while($Country_Row = mysql_fetch_array($Country_Records)) {
		$Country_Drop .= '<option value="' . Show_Data($Country_Row[Country_Code]) . '" ' . ($Country_Row[Country_Code] == "USA" ? ' SELECTED' : '') . '>' . Show_Data($Country_Row[Country_Name]) . '</OPTION>';
	}
	
	$Country_Drop   .= "</select>";
	
	mysql_close();
	
	?>

	<script language="JavaScript">
	<!--
	function validate() {
		if (document.Register.F_Member_First_Name.value == "") {
			alert("Please enter your first name.");
		    document.Register.F_Member_First_Name.focus();
			return false;
		}
		
		if (document.Register.F_Member_Last_Name.value == "") {
			alert("Please enter your last name.");
		    document.Register.F_Member_Last_Name.focus();
			return false;
		}
		
		var goodEmail = document.Register.F_Member_Email.value.match(/(\S+@)\b/gi);

		if (!goodEmail) {
			alert('Please enter a valid e-mail address.')
			document.Register.F_Member_Email.focus();
		   	document.Register.F_Member_Email.select();
 			return false;
		}
			
		if (document.Register.F_Member_Password.value.length < 6) {
			alert("Please enter a password that is at least 6 characters long.");
		    document.Register.F_Member_Password.focus();
			return false;
		}
		
		if (document.Register.F_Member_Address.value == "") {
			alert("Please enter your address.");
		    document.Register.F_Member_Address.focus();
			return false;
		}
		
		if (document.Register.F_Member_City.value == "") {
			alert("Please enter your City.");
		    document.Register.F_Member_City.focus();
			return false;
		}
		
		if (document.Register.F_Member_State.value == "") {
			alert("Please enter your State or Province.");
		    document.Register.F_Member_State.focus();
			return false;
		}
		
		if (document.Register.F_Member_City.value == "") {
			alert("Please enter your City.");
		    document.Register.F_Member_City.focus();
			return false;
		}
		
		if (document.Register.F_Member_Zipcode.value == "") {
			alert("Please enter your Zip or Postal Code.");
		    document.Register.F_Member_Zipcode.focus();
			return false;
		}
					
		return true;
	}
	//-->
	</script>
	
	<table width="95%" cellspacing="0" cellpadding="0" border="0" align="center"><tr><td><form method="post" onsubmit="return validate();" name="Register"><input type="hidden" name="mode" value="save">
	
	<table width="100%" align="center" cellpadding="2" cellspacing="0" class="Adm_TBG_2" border="0">
	  	<tr class="Adm_Head_Row"> 
           	<td colspan="5" align="center">Member Details and Login Information</td>
      	</tr>
               
       	<tr class="Adm_Content_Row"> 
          	<td width="90">First Name:</td>
           	<td width="300"><input name="F_Member_First_Name" type="text" style="width:100%;" maxlength="128"></td>
			<td width="10">&nbsp;</td>
			<td nowrap>Last Name:</td>
           	<td width="300"><input name="F_Member_Last_Name" type="text" style="width:100%;" maxlength="128"></td>
	  	</tr>
				
		<tr class="Adm_Content_Row"> 
           	<td nowrap>Email Address:</td>
           	<td><input name="F_Member_Email" type="text" style="width:100%;" maxlength="64"></td>
			<td width="10">&nbsp;</td>
			<td nowrap>Password:</td>
           	<td><input name="F_Member_Password" type="password" style="width:100%;" maxlength="32"></td>
	  	</tr>
	  </table>
			  
	  <BR>
			
	  <table width="100%" align="center" cellpadding="2" cellspacing="2" class="Adm_TBG_2">
      	<tr class="Adm_Head_Row"> 
        	<td colspan="8" align="center">Mailing Address <em>(Should match your credit card billing address for purchases)</em></td>
        </tr>
			  
		<tr class="Adm_Content_Row"> 
         	<td width="90">Organization:</td>
        	<td colspan="4"><input name="F_Member_Organization" type="text" style="width:100%;" maxlength="255"></td>
 	  	</tr>
        
		<tr class="Adm_Content_Row"> 
        	<td>Address:</td>
            <td colspan="4"><input name="F_Member_Address" type="text" id="F_Member_Address" style="width:100%;" maxlength="255"></td>
        </tr>
        
		<tr class="Adm_Content_Row"> 
        	<td>City:</td>
            <td width="300"><input name="F_Member_City" type="text" id="F_Member_City" style="width:100%;" maxlength="128"></td>
            <td width="10">&nbsp;</td>
            <td>State/Province:</td>
            <td width="300"><input name="F_Member_State" type="text" id="F_Member_State" style="width:100%;" maxlength="64"></td>
         </tr>
		  
		 <tr class="Adm_Content_Row">		
			<td>Country:</td>
			<td><?= $Country_Drop ?></td>
			<td width="10">&nbsp;</td>
			<td>Zip Code:</td>
            <td><input name="F_Member_Zipcode" type="text" id="F_Member_Zipcode" style="width:100%;" maxlength="15"></td>
         </tr>
		</table>
		
		<BR>
		
		<div align="center"><input name="submit" type="submit" id="mode" value="Register" class="Adm_Buttons_Medium"></div>

		</form></td></tr></table>
	<?
	
	include 'foot.php';
	exit;
}


?>
