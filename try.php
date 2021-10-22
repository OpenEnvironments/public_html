<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

if(isset($_POST['submit'])){
echo "SUBMISSION COMPLETE";
}

?>
		<form action="" method="POST">
			<p>first<input type="text" name="first"></p>
			<p>last<input type="text" name="last"></p>
			<p>submit:<button type="submit"></p>
		</form>
	</body>
</html>