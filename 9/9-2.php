<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	function telVerify($tel)
	{
		return (bool) preg_match('/^1[345678]\d{9}$/', $tel);
	}
	var_dump(telVerify('400-618-40000'));
	var_dump(telVerify('177025598222'));
	var_dump(telVerify('12088384157'));
	var_dump(telVerify('17828764454'));
	?>
</body>
</html>