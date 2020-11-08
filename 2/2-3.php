<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        
        $num = 1;
        echo '$num = ',$num.'<hr/>';
        $i = $num +1;
        echo '$i = ',$i.'<hr/>';
        $i = $num = 3;
        echo '$i = ',$i.' &nbsp;&nbsp;&nbsp;&nbsp;',
        '$num = ',$num.'<hr/>';
        echo '$i + $num = ',$i+$num.'<hr/>';
        echo "$num";//PHP中""可以访问变量，''按字符串原样输出

    ?>
</body>
</html>