<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数组</title>
</head>
<body>
<?php
/**数组特点：
 * 下标都为整数是索引数组，都为字符串是关联数组，
 * 同时存在是混合数组。数组元素顺序与下标无关，
 * 与存入顺序同。
 */

#数组定义方式：(下标可以是字母或数字)
//1，array关键字定义方式
$arr=array(1,2,3);
//2,'[]'中括号定义
$arr=[1,2,3];
//3,给变量添加中括号,系统自动更改为数组
$a[]=1;//默认从0开始
$a[3]=2;//可指定下标(可字符)，2,1下标元素不存在
$a[]=3;//默认下标为当前最大下标的下一位$a[4]
//索引数组：用'key=>value'方式表示
$arr=["name"=>'haha','age'=>18];
$arr['sex']='男';//也可用字符串下标方式
print_r($arr);//专输出数组

#数组遍历：多维数组需要嵌套遍历
//foreach遍历
foreach ($arr as $value) {
    echo $value,'<br/>';}
//as后用'=>'分隔两变量时前一个表示key后表示value
foreach ($arr as $key => $value) {
    echo $key,'--',$value,'<br/>';}
//each指针方式取数组值，返回4元素数组
each($arr);//指向$arr第一个元素
//按顺序给变量赋值(必须为索引数组，且下标从0连续增长)
// list($var,...)=$arr;//将$arr中元素从0对应赋值给变量

#数组排序函数
//对元素排序，并重置下标
sort($arr);//升序
rsort($arr);//逆序
//对元素排序，保留下标排
asort($arr);//升序
arsort($arr);//逆序
//对关联数组，根据key排序
ksort($arr);
krsort($arr);
//随机打乱数组元素值，下标重排
shuffle($arr);

#数组指针函数(指针指向数组外时返回false)
reset($arr);//指针指向数组首位并返回值
end($arr);//指向最后一位并返回值
next($arr);//指针指向下一位并返回值
prev($arr);//上移
current($arr);//获取当前指向的值
key($arr);//获取当前key

#其它函数
count($arr);//获取数组元素个数
array_push($arr,1);//在数组最后加入一个元素
array_pop($arr);//从数组最后取出一个元素(删除并返回)
array_unshift($arr,1);//在数组前面加入一个元素
array_shift($arr);//在数组前面取出一个元素
array_reverse($arr);//数组元素倒置
in_array(1,$arr);//某元素是否在数组中存在
array_keys($arr);//获取数组所有下标，返回索引数组
array_values($arr);//获取数组所有元素值，返回索引数组



?>


</body>
</html>