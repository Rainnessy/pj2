<?php
session_start();
$_SESSION["Username"] = null;
function getLoginForm(){
    return '<div class="container">
            <form name="login" method="post">
                <p>
                <div class="modi">用户名：</div>
                <input type="text" name="uid" pattern="^[a-zA-Z0-9_]+$" required
                       placeholder="用户名由下划线、数字、字母组成">
                </p>
                <p>
                <div class="modi">密码</div>
                <input type="password" name="password" required
                       placeholder="请输入密码">
                </p>
                <p class="submit">
                    <input type="submit" value="登录">
                </p>
            </form>
            <div class="regi">
                <a href="register.php">没有账户？请先注册</a>
            </div>
            </div>';
}
?>
<?php
require_once("../config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(validLogin()){
        // add 1 day to the current time for expiry time
        $_SESSION['Username']=$_POST['uid'];
    }
    else{
        echo "<script>alert('用户名或密码错误');</script>";
    }
}
function validLogin(){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    //very simple (and insecure) check of valid credentials.
    $sql = "SELECT * FROM traveluser WHERE UserName=:user and Pass=:pass";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':user',$_POST['uid']);
    $statement->bindValue(':pass',$_POST['password']);
    $statement->execute();

    if($statement->rowCount()>0){
        return true;
    }
    return false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/login.css"
</head>
<body>
    <?php
        if (!isset($_SESSION['Username'])){
            echo getLoginForm();
        }
        else{
            header('Location: ../index.php');
        }
    ?>
<footer>
    <div class="row">
        <p>Copyright © 2019-2020 Web fundamental. All Rights Reserved. 备案号：18307130374</p>
    </div>
</footer>
</body>
</html>