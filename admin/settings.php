<? 

// **** Primary Configuration Data

$DB_HostName    = "70.40.220.117";
$DB_Name        = "openenvi_mysql";
$DB_UserName    = "openenvi_mysql1";
$DB_Password    = "Shad0w_Lands";

$Site_Dir   	= "/home3/openenvi/public_html";
$Site_Root  	= "/";

$Admin_Dir   	= $Site_Dir . "admin/";
$Admin_Root  	= $Site_Root . "/";

$Documents_Dir  = $Site_Dir . "admin/documents/";   // *** This Directory Should Be Secure
$Documents_Root = $Admin_Root . "documents/";  	    // *** This Directory Should Be Secure

$Previews_Dir   = $Site_Dir . "previews/";          // *** This Directory Should Be Public
$Previews_Root  = $Site_Root . "previews/";         // *** This Directory Should Be Public

//$Secure_Root     = "https://www.openenvironments.com/";

// **** Authorize.Net Configuration
// **** Test  $Auth_Net_Login_ID = "92KgL2uD";
// **** Test  $Auth_Net_Tran_Key = "4nT73z4473vLJfXF";
//$Auth_Net_Login_ID = "5yuw2FUAY8nD";
//$Auth_Net_Tran_Key = "383Zgd7FFP3c5UK8";
// **** $Auth_Net_Submit   = "https://test.authorize.net/gateway/transact.dll";       // *** TEST MODE
//$Auth_Net_Submit = "https://secure.authorize.net/gateway/transact.dll";     // *** LIVE MODE

$Success_Email   = "admin@openenvironments.com";
$Failure_Email   = "admin@openenvironments.com";


// **** Email Sender Setup

$From_Name  = "Open Environments";
$From_Email = "support@openenvironments.com";


// **** Assign Number of results per page

$Max_Rows    = "10";
$Max_Gloss   = "25";
$Max_Docs    = "15";
$Home_List   = "10";


// **** Assign maximum character widths

$Max_Summary = "370";
$Max_Term    = "20";
$Max_Synonym = "40";
$Max_Def     = "60";


// **** Internal Defaults, Do not Change

$term      = "";
$Show_Ads  = 0;
$Auto_Meta = 1;


?>
