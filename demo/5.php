<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件读写</title>
</head>
<body>
<?php

$filePathName="test.php";
$con="hello world";

#php5获取文件所有内容
file_get_contents($filePathName);
//将指定内容写入到指定文件中
file_put_contents($filePathName,$con);

#php4操作文件(依赖于文本指针)
/**fopen参2模式选择
 * "r"	只读方式打开，指针指向文件头。
 * "r+"	读写方式打开，指针指向文件头。
 * "w"	写入方式打开，指针指向文件头并将清空。文件不存在则尝试创建。
 * "w+"	读写方式打开，指针指向文件头并将清空。文件不存在则尝试创建。
 * "a"	写入方式打开，指针指向文件末尾。如果文件不存在则尝试创建之。
 * "a+"	读写方式打开，指针指向文件末尾。如果文件不存在则尝试创建之。
 */
$file = fopen($filePathName,'a+');//打开一个资源
$string=fread($file,10);//从打开的资源中读取指定长度字节
fwrite($file,'haha');//向打开资源中写入指定内容
fclose($file);//关闭资源

#文件函数
is_file($filePathName);//是否为文件
filesize($filePathName);//文件大小
file_exists($filePathName);//文件是否存在
unlink($filePathName);//取消磁盘和磁盘地址的连接(删除文件)
filemtime($filePathName);//文件最后一次被修改的时间
fseek($filePathName,5);//设定fopen打开文件的指针位置(字节)
fgetc($filePathName);//一次获取一个字符
fgets($filePathName);//一次获取一个字符串(默认一行)
file($filePathName);//读取整个文件，按行读取返回数组


?>
</body>
</html>