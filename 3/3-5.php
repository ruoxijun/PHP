<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>1-99的立方和</title>
</head>
<body>
    <?php

        echo "for输出 1-99 的立方和: ";
        echo conSumPow_F(1,99,3),"<hr/>";
        echo "while输出 1-99 的立方和: ";
        echo conSumPow_W(1,99,3),"<hr/>";
        echo "do-while输出 1-99 的立方和: ";
        echo conSumPow_DW(1,99,3),"<hr/>";

        /**
         * 下面三个函数用三种不同的循环，
         * 计算返回从$head到$end,
         * $power次方的和。
         */
        function conSumPow_F($head,$end,$power){//用for方式
            $sum = 0;
            for ($i=$head; $i <= $end; $i++) { 
                $sum += pow($i,$power);
            }
            return $sum;
        }

        function conSumPow_W($head,$end,$power){//用while方式
            $sum = 0;
            $i=$head; 
            while($i <= $end) { 
                $sum += pow($i,$power);
                $i++;
            }
            return $sum;
        }

        function conSumPow_DW($head,$end,$power){//用do-while方式
            $sum = 0;
            $i=$head; 
            do{ 
                $sum += pow($i,$power);
                $i++;
            } while($i <= $end);
            return $sum;
        }
    ?>
</body>
</html>