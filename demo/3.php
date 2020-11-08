<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表单</title>
</head>
<body>


<!-- <a href="www.xxx.cn/index.php?key=value">//a标签传值必须有'?'后跟键值对
<script>//也可以用一下两种方式传值
    location.href="www.xxx.cn/index.php?key=value";
    location.assign("www.xx.cn/index.php?key=value");
</script> -->
<?php

//在浏览器中输入http://localhost/demo/3.php?name=haha
//接受数组的3种方式:它们都返回数组,表单name为下标,value为值
var_dump($_GET);//接受get提交的数据
var_dump($_POST);//接受post提交的数据
//接受get或post提交的所有数据
var_dump($_REQUEST);//将get和post合并到一个数组

#复选框数据的提交
/**PHP中数字的key唯一，复选框name属性取名一般要相同
 * PHP中变量加上'[]'被认为是一个数组，可采用'name[]'方式取名
 * 在PHP中此name将指向一个数组，$_POST['name']
 * 应将此数组转为字符串进行存储操作
 */


?>
<form action="" method="post">
    <input type="checkbox" name="check[]" value="1">
    <input type="checkbox" name="check[]" value="2">
</form>

</body>
</html>