<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>产生20个0~99的随机数，并打印出最小的数</title>
</head>

<body>
    <?php
    //定义一个最小数
    $min = 99;
    echo "20个0~99的数：";
    for ($i = 1; $i <= 20; $i++) {
        //随机生成20个0~99的数
        $tmp = rand(0, 99);
        echo $tmp . "&nbsp;";
        //判断
        if ($tmp < $min) {
            $min = $tmp;
        }
    }
    echo '<br>' . "最小的数是：" . $min;
    ?>
</body>

</html>