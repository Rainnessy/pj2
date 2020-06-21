<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>上传照片</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/upload.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">首页</a></li>
            <li><a href="browse.php">浏览</a></li>
            <li><a href="search.php">搜索</a></li>
            <div class="dropdown">
                <div class="fa fa-home dropbtn"> 个人中心</div>
                <div class="dropdown-content">
                    <a href="upload.php"><span class="fa fa-upload">&nbsp;上传照片</span></a>
                    <a href="myphotos.php"><div class="fa fa-file-picture-o">&nbsp;我的照片</div></a>
                    <a href="mycollections.php"><div class="fa fa-cube">&nbsp;我的收藏</div></a>
                    <a href="login.php"><div class="fa fa-registered">&nbsp;用户登录</div></a>
                </div>
            </div>
        </ul>
    </nav>
    <article>
    <div class="container">
        <h2>上传图片</h2>
        <form name="upload" method="post" action="figure.php">
        <div class="upload">图片未上传</div>
            <button type="button">upload</button>
        <p>图片标题</p>
        <input name="title" type="text">
            <p>图片描述</p>
        <input name="desc" type="text">
            <p>拍摄国家</p>
        <input name="coun" type="text">
        <p>拍摄城市</p>
        <input name="city" type="text">
        <input type="submit" value="提交" onclick="alert('敬请期待')">
        </form>
    </div>
    </article>
    <footer>
        <div class="row">
            <p>Copyright © 2019-2020 Web fundamental. All Rights Reserved. 备案号：18307130374</p>
        </div>
    </footer>
</body>
</html>