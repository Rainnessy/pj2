<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/register.css"
</head>
<body>
<div class="container">
    <form name="register" method="post" onsubmit="return check()" action="../php/register.php">
        <p>
            <div id="checkuid" class="modi">用户名：</div>
            <input id="uid" type="text" name="user" pattern="^[a-zA-Z0-9_]+$" required
               placeholder="由下划线、数字、字母组成">
        </p>
        <p>
            <div id="checkemail" class="modi">邮箱：</div>
            <input id="email" type="email" name="email" required
            placeholder="请填写您的常用邮箱">
        </p>
        <p>
            <div id=strong class="modi">密码:</div>
            <input id="pass" type="password" name="pass" required
            placeholder="请输入密码">
        </p>
        <p>
            <div id="confirm" class="modi">确认密码：</div>
            <input id="checkpass" type="password" name="repass" required
            placeholder="确认您的密码">
        </p>
        <p class="submit">
            <input id="submit" type="submit" value="注册">
        </p>
    </form>
</div>
    <footer>
        <div class="row">
            <p>Copyright © 2019-2020 Web fundamental. All Rights Reserved. 备案号：18307130374</p>
        </div>
    </footer>
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script>
    function check(){
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");
        if(!enoughRegex.test($("#pass").val())) {
            alert("weak password!");
            return false;
        }
        if($('#pass').val() !== $("#checkpass").val()){
            alert("password != confirm password!");
            return false;
        }
        if ($("#uid").val().length < 4){
            alert("username need above or equal 4");
            return false;
        }
        var pattern=/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
        if(!pattern.test($("#email").val())){
            alert("the format of email is wrong!");
            return false;
        }
        return true;
    }
</script>
</html>