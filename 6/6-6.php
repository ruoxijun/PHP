<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>6-6</title>
</head>

<body>
    <?php
    echo isset($a);
    echo empty($a); //判空
    echo "<hr>";
    $a = 666;
    echo isset($a);
    echo "<hr>";
    echo is_int($a);
    echo "<hr>";
    echo gettype($a);
    echo "<hr>";
    unset($a);
    echo isset($a);
    ?>
</body>

</html>