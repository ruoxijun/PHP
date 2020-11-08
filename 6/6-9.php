<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    //编写程序，在网页中显示今天离元旦还有多少天，如果今天是元旦则显示元旦快乐

    //1.利用strtotime()函数获取两个日期的时间戳
    $day1 = strtotime("now");
    $day2 = strtotime("2021-01-01");
    //2.再计算两个日期相差秒数
    $s = $day2 - $day1;
    $time = (int) ($s / 3600 / 24) + 1;
    //3.判断秒数大于0则表示不是元旦，否则就输出“元旦快乐”
    if ($s > 0) {
        echo "距离元旦还有：$time" . "天";
    } else {
        echo "元旦快乐！";
    }
    ?>
</body>

</html>