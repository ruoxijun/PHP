<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>9 9乘法表</title>
</head>
<body>

    <table border="1">
        <?php 
        for($i = 1;$i<=9;$i++){
            echo "<tr>";
                for($n = 1;$n<=$i;$n++){
                    if($n%2==0){
                        echo "<td class='even'>";
                        echo $i."*".$n."=",$i*$n;
                        echo "</td>";
                    }
                     if($n%2!=0){
                        echo "<td class='odd'>";
                        echo $i."*".$n."=",$i*$n;
                        echo "</td>";
                    }
                     }
            echo "</tr>";
                }
            ?>
    </table>
</body>
</html>