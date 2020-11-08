<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>6-5</title>
</head>

<body>
    <?php
    function factorial($n)
    {
        if ($n == 1) {
            return 1;
        }
        return $n * factorial($n - 1);
    }
    echo factorial(4);
    ?>
</body>

</html>