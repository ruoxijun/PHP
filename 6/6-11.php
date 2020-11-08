<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>打印当前网页的地址</title>
</head>

<body>
    <?php
    echo "此PHP文件的地址：", __FILE__;
    echo "<hr>";
    echo "当前PHP文件所在目录的地址：", dirname(__FILE__);
    ?>
</body>

</html>