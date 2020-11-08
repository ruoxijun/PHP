<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件</title>
</head>
<body>
<?php
$pathname="test";
//文操作都伴随错误，不需要它显示可以在语句前加'@'错误抑制符
//创建目录(相对路径和绝对路径都可以)
echo (mkdir($pathname));//创建成功返回true反之false
//删除文件夹
echo (rmdir($pathname));//成功返回true
//读取目录
$file=opendir('./');//打开该资源
//每个文件夹都默认有'.'和'..'文件夹,代表本目录和上一级目录
// echo readdir($file);//获取此时指针指向的文件名，且指针下移
while ($a=readdir($file)) {//通常遍历方式
    var_dump($a) ;
}
closedir($file);//关闭该资源

dirname($pathname);//返回包裹此文件的路径
realpath($pathname);//返回真实路径，传入文件返回false
is_dir($pathname);//判断此资源是否是目录
scandir($pathname);//以数组形式返回该目录下的所有文件名






?>
</body>
</html>