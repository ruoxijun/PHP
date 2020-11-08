<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>6-4</title>
</head>

<body>
    <?php
    function sum($sub1, $sub2)
    {
        return $sub1  + $sub2;
    }
    function avg($sub1, $sub2)
    {
        $sum = sum($sub1, $sub2);
        return $sum / 2;
    }
    echo avg(78.9, 83), "<hr>", avg(99, 89);
    ?>
</body>

</html>