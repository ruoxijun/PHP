<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>数据类型的检测</title>
</head>
<body>
    <?php
        $a = 1;
        var_dump(is_bool($a));//判断类型
        var_dump(1==true);//比较
        var_dump(true+1);//bool类型中true==1，false==0
        var_dump((bool)$a);//类型强制转换
        var_dump($a);

        echo @(4/0);//'@'符号可隐藏错误
    ?>
</body>
</html>