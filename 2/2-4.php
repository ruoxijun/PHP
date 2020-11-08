<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>2-4变量赋值</title>
</head>
<body>
    <?php
         echo '传值赋值<hr/>';
         $a = 20;
         $b = $a;
         $b = 30;
         echo '$a = '.$a.'<hr/>';
         echo '$b = '.$b;
         
         echo '引用赋值<hr/>';
         $a = 20 ;
         $b = &$a;
         $b = 30;
         echo '$a = '.$a.'<hr/>';
         echo '$b = '.$b;

         echo '<hr/>表达式<hr/>';
         $a = 10;
         echo '$a = '.$a<8;
    ?>
</body>
</html>