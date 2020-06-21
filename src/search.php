<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/search.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">首页</a></li>
            <li><a href="browse.php">浏览</a></li>
            <li><a class="active" href="search.php">搜索</a></li>
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
        <div class="search">
            <h2 class="title">筛查搜索</h2>
            <form name="search">
                <input type="radio" name="choose" value="one" checked>标题搜索<br>
                <input type="text" name="one">
                <input type="radio" name="choose" value="two">描述搜索<br>
                <input type="text" name="two">
                <button onclick="alert('敬请期待')">搜索</button>
            </form>
        </div>
        <div class="result">
            <h2 class="title">搜索结果</h2>
            <div class="wrap">
                <a href="figure.php"><div class="photo1"></div></a>
                <div class="figure1">
                    <h2>欧式建筑</h2>
                    <p>那天下的海，蔚蓝蔚蓝的，美极了。那多蓝呀！即使是再会调配颜回色的人，
                        恐怕也不能调出这么纯的颜色吧。</p>
                </div>
                <a href="figure.php"><div class="photo2">          </div></a>
                <div class="figure2">
                    <h2>欧式建筑</h2>
                    <p>那天下的海，蔚蓝蔚蓝的，美极了。那多蓝呀！即使是再会调配颜回色的人，
                        恐怕也不能调出这么纯的颜色吧。</p>
                </div>
                <a href="figure.php"><div class="photo3">            </div></a>
                <div class="figure3">
                    <h2>欧式建筑</h2>
                    <p>那天下的海，蔚蓝蔚蓝的，美极了。那多蓝呀！即使是再会调配颜回色的人，
                        恐怕也不能调出这么纯的颜色吧。</p>
                </div>
                <a href="figure.php"><div class="photo4">            </div></a>
                <div class="figure4">
                    <h2>欧式建筑</h2>
                    <p>那天下的海，蔚蓝蔚蓝的，美极了。那多蓝呀！即使是再会调配颜回色的人，
                        恐怕也不能调出这么纯的颜色吧。</p>
                </div>
            </div>
            <div><div class="footer">《  1  2  3  4  5  》</div></div>
        </div>
    </article>
    <footer>
        <div class="row">
            <p>Copyright © 2019-2020 Web fundamental. All Rights Reserved. 备案号：18307130374</p>
        </div>
    </footer>
</body>
</html>