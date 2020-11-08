<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	preg_match('/text/','badbtestad',$matches,PREG_OFFSET_CAPTURE);
	print_r($matches);
	?>
</body>
</html>