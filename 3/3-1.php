<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>if-else</title>
</head>
<body>
    <!-- 90-100分   优秀
         80-90分    良好
         70-80分    中等
         60-70分    及格
         小于60分   不及格-->

    <?php
        $score = 88;
        if ($score>=0 && $score<=100) {
            if ($score<60) {
                echo "成绩：",$score,"。 不及格!";
            } elseif($score<70){
                echo  "成绩：",$score,"。 及格!";
            } elseif($score<80){
                echo  "成绩：",$score,"。 中等!";
            } elseif($score<90){
                echo  "成绩：",$score,"。 良好!";
            } else {
                echo "成绩：",$score,"。 优秀!";
            }
        } else{
            echo "成绩 \"",$score,"\" 有误（成绩应在0-100内）";
        }
        
    ?>
</body>
</html>