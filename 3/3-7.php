<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>9 9乘法表</title>
    <style>
        body{
            font-family: '仿宋';
        }
        table{
            border-collapse: collapse;
        }
        td{
            border:black solid 1px;
            line-height: 50px;
            padding: 0 40px;
        }
        .odd{
            background: #00FF99;
        }
        .even{
            background: #CC6666;
        }
    </style>
</head>
<body>

    <h3>三角形与倒立三角形</h3>
    <?php
        const row = 9;
        // 正三角形
        for($i = 1;$i<=row;$i++){
            for($n = row-$i;$n>0;$n--)//打印空格
                echo "&nbsp";
            for($c = 1;$c <= 2*$i-1;$c++)//打印“*”号
                echo "*";
            echo "<br/>";
        }
        //倒立三角形
        for($i = row-1;$i>0;$i--){
            for ($n=0; $n < row-$i; $n++)//打印空格 
                echo "&nbsp";
            for ($c=0; $c < 2*$i-1; $c++)//打印“*”号
                echo "*";
            echo "<br/>";
        }

    ?>

    <hr/>
    <h3>99乘法表</h3>
    <table>
        <?php for($i = 1;$i<=9;$i++):?>
            <tr>
                <?php for($n = 1;$n<=$i;$n++):?>
                    <?php if($n%2==0):?>
                        <td class="even"><?php echo $i."*".$n."=",$i*$n;?></td>
                    <?php endif?>
                    <?php if($n%2!=0):?>
                        <td class="odd"><?php echo $i."*".$n."=",$i*$n;?></td>
                    <?php endif?>
                <?php endfor?>
            </tr>
        <?php endfor;?>
    </table>
</body>
</html>