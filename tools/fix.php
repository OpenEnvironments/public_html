<?php

mysql_connect("97.74.218.203","preciseadvice","pa1742FFE7") or die("Unable to connect to host");
mysql_select_db("preciseadvice") or die("Unable to select database DB_Name");
$Query = "UPDATE subjects set Subject_ID = '6' WHERE Subject_ID = '12';
$Record_Query = mysql_query($Query);
$Record_Count = mysql_affected_rows();

echo $Record_Query;
echo $Record_Count;

?>