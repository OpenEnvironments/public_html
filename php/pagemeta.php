<?php

/* get the metadata for the current page */

$page_id = $GLOBALS["page_id"];
$query = "SELECT * FROM core.page WHERE page_id = '".$page_id."';";
$conn = pg_connect("host=" . $DB_Host . " port=" . $DB_Port . " dbname=" . $DB_Name . " user=" . $DB_User . " password=" . $DB_Pass);
if (!$conn) {  echo "Database connection error!";  exit;}
$cursor = pg_query($conn,$query);
if (!$cursor) {  echo "An error occurred.\n";  exit;}
$num_rows = pg_num_rows($cursor);
if ( $num_rows > 1 ) {    $title = "Open Environments - MULTIPLE PAGES FOUND";
} elseif ( $num_rows < 1 ) {    $title = "Open Environments - PAGE NOT FOUND";
} else {    $row = pg_fetch_array($cursor);    $title = $row[1];};

?>
