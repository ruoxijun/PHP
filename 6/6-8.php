<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>6-8</title>
</head>

<body>
    <?php
    echo "<h3>身份证号码输出</h3>";
    include 'common.php';
    $sfz = '511322202004288555';
    //得到出生日期
    $birthday = getNewDate($sfz, 'c');
    //得到性别
    $gender = getSex($sfz, 'c');
    echo "你的身份证号是：" . getSfz($sfz, '*', 10) . '<br>' . "你的出生日期是：" . $birthday . '<br>' . " 你的性别是：" . $gender;
    echo "<h3>字符金字塔</h3>";
    ?>
    <div style="font-family: 楷体;">
        <?php
        $num = range(1, 9);
        $char = range('A', 'Z');
        $arr = array_merge($num, $char);
        //左
        $str = implode('', $arr);
        //右
        $strrev = strrev($str);
        $row = 20;
        for ($i = 1; $i <= $row; $i++) {
            $space = '';
            $space = str_pad($space, $row - $i, '*');
            $space = str_replace('*', '&nbsp;', $space);
            $char_left = substr($str, 0, $i);
            $char_right = '';
            $char_right .= substr($strrev, strlen($strrev) - $i + 1, $i - 1);
            echo $space . $char_left . $char_right . '<br>';
        }
        ?>
    </div>
</body>

</html>