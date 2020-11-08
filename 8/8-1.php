<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表单交互-表单1</title>
</head>
<body>
    
    <form action="8-2.php" method="post">
        name:<input type="text" name="name" id=""><br/>
        pass:<input type="password" name="pass" id=""><br/>
        <input type="submit" value="提交">
    </form>
    <?php
        if(!empty($_POST)){
            // var_dump($_POST);
            echo "表单2：<br/>";
            echo "姓名：",$_POST["name"],"<br/>密码：",$_POST["pass"];
        }
        
    ?>
</body>
</html>