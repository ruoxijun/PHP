<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
header('Content-type:text/html;charset=utf-8');
#基础
//字符串定义方式二：
$string = <<<a
    a表示边界符可随意，边界符之间的文字就是字符串，
    在网页源代码中它们会按格式输出，
    边界符加单引号跟单引号字符串同，
    边界符不加引号就是双引号字符串。
a;
echo $string;//必须使用此字符串不然会报错

$str="hello哈哈";
//双引号中会识别变量，去掉空格会报没有$str2错误
echo "1 $str 2";
echo "1{$str}2";//建议采用'{变量}'方式插入
echo strlen($str);//字符串长度,字节为单位（中文在utf8下占3字节）
echo mb_strlen($str,'utf-8');//字符串长度，参2可按指定编码表计算长度

echo '<hr/>';
$array=[1,2,3];
#字符串相关函数
strtolower("ab");//全小写
strtoupper("ab");//全大写
ucfirst("ab");//首字母大写

//按参1为分隔，让数组元素组成字符串并返回
$str_arr = implode('-',$array);
//按指定字符分隔字符串，组成数组返回
$array = explode('-',$str_arr);
//按参2指定长度分隔字符串，并返回数组
$array = str_split($str_arr,2);

//去除字符串两边空格，参2可选按指定字符去除直到出现不符合
trim(" 1234 ");//没参2默认空格(ltrim()左边，rtrim()右边)
//截取字符串,参1起始位置，参2长度(不填默认到末尾)
substr("0123",0,2);
strstr('abcd','bc');//截取从指定字符到末尾
strpos($str,'a');//字符串在目标字符串中首次出现的位置,为返回false
strrpos($str,'a');//最后出现的位置
str_replace('a','b',$str);//将$str中a全替换为b
// printf();同下都是格式化输出
sprintf('%d你好%s',1,'啊');
str_repeat($str,3);//将字符串重复指定次数
str_shuffle($str);//将字符串随机打乱
?>
</body>
</html>