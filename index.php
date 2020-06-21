<?php
require_once('config.php');
function output1(){
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql =' SELECT ImageID FROM travelimagefavor WHERE FavorID=1';
        $result = $pdo->query($sql);

        $row = $result->fetch();
        $sql = 'SELECT PATH FROM travelimage WHERE ImageID='.$row['ImageID'];

        $result = $pdo->query($sql);
        $row = $result->fetch();
        echo '<a href="src/figure.php"><img class="header" src="travel-images/large/' .$row['PATH'] .'"></a>';
        $pdo = null;
    }catch (PDOException $e) {
        die( $e->getMessage() );
    }
}
function output6() {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql =' SELECT ImageID FROM travelimagefavor WHERE FavorID > 1 and FavorID < 8';
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            $sql1 = 'SELECT PATH,Title FROM travelimage WHERE ImageID='.$row['ImageID'];
            $result1 = $pdo->query($sql1);
            $answer = $result1->fetch();
            echo '<div class="mypic">';
            echo '<a href ="src/figure.php">';
            echo '<img class="img" src="travel-images/large/' .$answer['PATH'] .'">';
            echo  '</a>';
            echo '<div class="desc">'.$answer['Title'].'</div>';
            echo '</div>';
        }
        $pdo = null;
    }catch (PDOException $e) {
        die( $e->getMessage() );
    }
}
function output(){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql ='select PATH from travelimage order by rand() limit 7';
    $result = $pdo->query($sql);
    $row = $result->fetch();
    echo '<img class="header" src="travel-images/large/' .$row['PATH'] .'">';
    while($row = $result->fetch()){
        echo '<div class="mypic">';
        echo '<a href ="src/figure.php">';
        echo '<img class="img" src="travel-images/large/' .$row['PATH'] .'">';
        echo  '</a>';
        echo '<div class="desc">'.$row['Description'].'</div>';
        echo '</div>';
    }

    $pdo = null;
}
?>
<!DOCTYPE html>
<html lang="ch">
<head>
    <meta charset="UTF-8">
    <title>Go travel</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <a name="top"></a>
    <nav>
        <ul>
            <li><a class="active" href="index.php">首页</a></li>
            <li><a href="src/browse.php">浏览</a></li>
            <li><a href="src/search.php">搜索</a></li>
            <?php
                session_start();
                if(isset($_SESSION['Username'])){
                    echo '  <div class="dropdown">
                            <div class="fa fa-home dropbtn"> 个人中心</div>
                            <div class="dropdown-content">
                            <a href="src/upload.php" class="fa fa-upload">上传照片</a>
                            <a href="src/myphotos.php" class="fa fa-file-picture-o">我的照片</a>
                            <a href="src/mycollections.php" class="fa fa-cube">我的收藏</a>
                            <a href="src/logout.php" class="fa fa-registered">登出</a>
                            </div>
                            </div>';
                }
                else{
                    echo '<div class="login"><a href="src/login.php">用户登录</a></div> ';
                }
                ?>
        </ul>
    </nav>
    <article id="a">
        <?php
            output1();
            output6();
        ?>
    </article>
    <aside>
        <button id="refresh" onclick="a()">刷新图片</button>
        <a href="#top"><button>回到顶部</button></a>
    </aside>
    <footer>
        <div class="container">
            <div class="first">
                <p><a>使用条款</a></p>
                <p><a>隐私保护</a></p>
                <p><a>Cookie</a></p>
            </div>
            <div class="second">
                <p><a>关于</a></p>
                <p><a>联系我们</a></p>
            </div>
            <div class="third">
                <img src="images/wechat.jpg"/>
            </div></div>
            <div class="row">
                <p>Copyright © 2019-2020 Web fundamental. All Rights Reserved. 备案号：18307130374</p>
            </div>
    </footer>
</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script>
    function a() {
        $("#a").load("php/index.php");
    }
</script>
</html>