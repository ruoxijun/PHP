<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>字符串函数的应用</title>
</head>

<body>
    <?php
    echo "<h3>字符串与数组相互转换</h3>";
    $str = 'PHP | ASP | JSP';
    $arr = explode('|', $str);
    print_r($arr);
    $str = implode(';', $arr);
    echo '<br>' . $str;

    echo "<h3>获取字符串长度</h3>";
    $str = "China中国";
    echo strlen($str);

    echo "<h3>删除空格</h3>";
    $str = " I love PHP and MySQL!  ";
    echo strlen($str) . '<br>';
    echo "trim(\$str) 的字符串长度是：" . strlen(trim($str)) . '<br>';
    echo "ltrim(\$str) 的字符串长度是：" . strlen(ltrim($str)) . '<br>';
    echo "rtrim(\$str) 的字符串长度是：" . strlen(rtrim($str)) . '<br>';

    echo "<h3>将字符串转换为大小写</h3>";
    $str = 'I love PHP and MySQL';
    $s1 = strtolower($str);
    $s2 = strtoupper($str);
    echo $str . '<br>' . $s1 . '<br>' . $s2;

    echo "<h3>首字母大写</h3>";
    $str = 'i love PHP and MySQL';
    $s1 = ucfirst($str);
    $s2 = ucwords($str);
    echo $str . '<br>' . $s1 . '<br>' . $s2;

    echo "<h3>查询</h3>";
    $str = "I love PHP and MySQL!";
    echo "\$str = \"I love PHP and MySQL!\"<br>";
    echo var_dump(strpos($str, "p")) . '<br>';
    echo "stripos(\$str, \"p\") = " . stripos($str, "p") . '<br>';
    echo "strpos(\$str, \"P\") = " . strpos($str, "P") . '<br>';
    echo "strpos(\$str, \"p\",8) = " . strpos($str, "p" . 8) . '<br>';
    echo "strrpos(\$str, \"p\") = " . strrpos($str, "P");

    echo "<h3>查询并截取</h3>";
    $email = 'name@example.com';
    $domain = strstr($email, '@');
    echo $domain . '<br>';
    echo substr($email, 0, 4), '<br>';
    echo substr($email, 5);

    ?>
</body>

</html>