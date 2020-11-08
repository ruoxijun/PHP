<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>数据类型</title>
</head>
<body>
    <?php
        $a = true;
        $b = false;
        echo $b,'<hr/>';//bool类型echo无法直接输出

        echo '<h1>字符串练习</h1>';
        $s1 = '大家好';
        $s2 = '请认真听讲\'';//'\'转义字符
        echo "$s1".$s2;
        var_dump($s1);
        
        echo '<h1>变量运算及类型转换</h1>';
        $c = 10;
        var_dump($c);
        echo '<hr/>';
        $a = $a."大家好";
        var_dump($a);
    ?>
</body>
</html>