<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ThemeBucket">
<link rel="shortcut icon" href="#" type="image/png">

<title>后台登陆</title>

<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">


</head>

<body class="login-body">

    <?php
    require_once 'conn.php';
    header("content-type:text/html;charset=utf-8");
    //取表单数据
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $password2 = sha1($password);

    //sql语句中字符串数据类型都要加引号，数字字段随便
    $sql = "INSERT INTO user(id, username, password) VALUES (null,'$username','$password2')";
    //exit($sql);
    ?>

	<div class="container">
		<form method= "post" class="form-signin" onsubmit='return check()' action="logindo.php">
			<div class="form-signin-heading text-center">
				<h1 id="cla" class="sign-title">
                    <?php
                        if(mysql_query($sql)){
                            echo "注册成功";
                        }else{
                            echo "注册失败";
                        }
                    ?>
                </h1>
				<img src="images/login-logo.png" alt="" />
			</div>
			<div class="login-wrap">
            <button id="sub" class="btn btn-lg btn-login btn-block">
                <?php
                    echo (mysql_query($sql));
                    if(mysql_query($sql)){
                        // echo "<a href='login.php'>去登录</a>";
                        echo "去登录";
                    }else{
                        // echo "<a href='registration.php'>重注册</a>";
                        echo "重注册";
                    }
                ?>
            </button>
			</div>
		</form>

    </div>
    
	<script src="js/bootstrap.min.js"></script>
	<script src="js/modernizr.min.js"></script>
    <script>
        var getById = id => document.getElementById(id);
		window.onload=()=>{
            var sub = getById("sub");
            var cla = getById("cla");
            var location = "";
            if(cla.innerText=="注册成功"){
                    sub.innerHTML="去登录";
                    location="login.php";
                }else{
                    sub.innerHTML="重注册";
                    location="http://localhost:8888/phpEndProject/registration.php";
                }
            console.log(location);
            sub.onclick=()=>{
                window.location.href = location;
            }
        };
	</script>
</body>
</html>