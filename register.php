<?php

echo "<br><br><br>HELLO WORLD!<br><br><br>";

		$query = "
				INSERT INTO core.member
				(
				    member_id,
				    member_email,
				    member_name,
				    member_password,
				    member_validation, 							    member_validated,
				    member_enabled,
				    member_created,
				    member_notes
				)
				VALUES
				(
				(SELECT MAX(member_id)+1 FROM core.member),
				'".$OEregister_form_email."',
				'".$OEregister_form_name."',
				'".$OEregister_form_pwdnew."',
				'".$validation."',
				'N',
				'N',
				current_date,
				'');
			";
			$conn = pg_connect("host=" . $OE_host . " port=" . $OE_port . " dbname=" . $OE_name . " user=" . $OE_user . " password=" . $OE_pass);
				if (!$conn) {  echo "Registration Form: database connection error!\n";  exit;}
			$cursor = pg_query($conn,$query);
				if (!$cursor) {  echo "Registration Form: insert error occurred.\n";  exit;}
echo "<br><br>";
echo $query;
echo "<br><br>";

		
?>