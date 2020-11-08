<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        //常量的两种定义方式
        define('H','Hello ');
        const W= 'World!';

        echo H;
        echo W,'<hr/>';
        //define的第三个参数
        define('HI','Hi ',true);//第三个参数默认false，改为true将不区分该常量大小写
        echo hi;//小写方式访问HI常量
        echo W;
    ?>
</body>
</html>