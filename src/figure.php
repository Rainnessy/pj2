<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图片详情</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/figure.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">首页</a></li>
            <li><a href="browse.php">浏览</a></li>
            <li><a href="search.php">搜索</a></li>
            <?php
            session_start();
            if(isset($_SESSION['Username'])){
                echo '  <div class="dropdown">
                            <div class="fa fa-home dropbtn"> 个人中心</div>
                            <div class="dropdown-content">
                            <a href="upload.php"><span class="fa fa-upload">上传照片</span></a>
                            <a href="myphotos.php"><div class="fa fa-file-picture-o">我的照片</div></a>
                            <a href="mycollections.php"><div class="fa fa-cube">我的收藏</div></a>
                            <a href="logout.php"><div class="fa fa-registered">登出</div></a>
                            </div>
                            </div>';
            }
            else{
                echo '<div class="login"><a href="login.php">用户登录</a></div> ';
            }
            ?>
        </ul>
    </nav>
    <article>
        <h1>图片详情</h1>
        <h2>乱七八糟 by Me</h2>
        <div class="leftwrapper"><div class="left"></div></div>
        <div class="rightwrapper">
        <div class="right">
            <h3>排名</h3>
            <div>2</div>
            <h3>详情</h3>
            <div>内容：风景</div>
            <div>城市：巴黎</div>
                <div>国家：法国</div>
            <button onclick="alert('敬请期待')">收藏</button>
        </div>
        </div>
        <p>
            夕阳落山不久,西方的天空,还燃烧着一片橘红色的晚霞。
            大海,也被这霞光染成了红色,而且比天空的景色更要壮观。
            因为它是活动的,每当一排排波浪涌起的时候,那映照在浪峰上的霞光,
            又红又亮,简直就像一片片霍霍燃烧着的火焰,闪烁着,消失了。
        </p>
    </article>
    <footer>
        <div class="row">
            <p>Copyright © 2019-2020 Web fundamental. All Rights Reserved. 备案号：18307130374</p>
        </div>
    </footer>
</body>
</html>