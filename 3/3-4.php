<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>"*"打印等边三角形</title>
    <style>
        .triang{
            text-align: center;
        }
    </style>
</head>
<body>

    <?php

    const ROWNUM = 6;//定义等边三角形行数为常量
    
    echo "依靠CSS居中："."<br/>";
    showDivTriang(ROWNUM);//css居中

    echo "<hr/>";

    echo "依靠空格居中："."<br/>";
    showTriang(ROWNUM);//空格补齐

    function showDivTriang($rowNum){//将三角形放在class为triang的div中
        echo "<div class='triang'>";
        for ($i=1; $i <= $rowNum ; $i++) {
            for ($n=0; $n < $i*2 - 1; $n++) {
                echo "*";
            }
        echo "<br/>";
        }
        echo '</div>';
    }

    function showTriang($rowNum){//用空格来对齐
        for ($i=1; $i <= $rowNum ; $i++) {
            for ($o=$rowNum-$i; $o > 0; $o--) {//根据行数打印空格
                echo "&nbsp";
            }
            for ($n=0; $n < $i*2 - 1; $n++) {
                echo "*";
            }
            echo "<br/>";
        }
    }
    ?>

</body>
</html>