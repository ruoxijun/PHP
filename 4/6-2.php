<?php

declare(strict_types=1);
function shout()
{
    return 'come on';
}
echo shout();
echo "<br>";
    //按值传递参数
    // function add($a, $b)
    // {
    //     $a  = $a + $b;
    //     return $a;
    // }
    // echo add(5, 7);
    // echo "<br>";
    // $x = 5;
    // $y = 7;
    // echo add($x, $y);
    // echo "<br>";

    // //引用参数
    // function extra(&$str)
    // {
    //     $str .= 'and some extra';
    // }
    // $var = 'food';
    // extra($var);
    // echo $var;
    // echo "<br>";

    // //设置参数默认值
    // function say($p, $con = 'say "Hello"')
    // {
    //     return "$p $con";
    // }
    // echo say('tom');
    // echo "<br>";

    // //指定参数类型
    // function sum1(int $a, int $b)
    // {
    //     return $a + $b;
    // }
    // echo sum1(2, 3);
    // echo "<br>";

    // //强类型的参数
    // function sum2(int $a, int $b)
    // {
    //     return $a + $b;
    // }
    // echo sum2(2, 3);
    // echo "<br>";

    // //设置函数返回值类型
    // function returnIntValue(int $value)
    // {
    //     return $value + 1.0;
    // }
    // echo returnIntValue(5);
    // echo "<br>";
    // 
