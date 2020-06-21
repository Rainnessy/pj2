<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>浏览</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/browse.css?param=Math.random()">
</head>
<body>
    <nav>
        <ul>
            <li><a href="../index.php">首页</a></li>
            <li><a class="active" href="browse.php">浏览</a></li>
            <li><a href="search.php">搜索</a></li>
            <?php
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
    <div class="main">
    <aside>
        <section class="search">
        <h2>搜索一下</h2>
        <input type="search">
        <div class="sear fa fa-search" onclick="alert('敬请期待')"></div>
        </section>
        <div class="country">
            <h2>热门国家快速浏览</h2>
            <div onclick="alert('敬请期待')">法国</div>
            <div onclick="alert('敬请期待')">美国</div>
            <div onclick="alert('敬请期待')">中国</div>
            <div onclick="alert('敬请期待')">英国</div>
        </div>
        <div class="area">
            <h2>热门地区快速浏览</h2>
            <div onclick="alert('敬请期待')">巴黎</div>
            <div onclick="alert('敬请期待')">伦敦</div>
            <div onclick="alert('敬请期待')">香格里拉</div>
            <div onclick="alert('敬请期待')">西双版纳</div>
        </div>
        <div class="hot">
            <h2>热门内容快速浏览</h2>
            <div onclick="alert('敬请期待')">黄昏</div>
            <div onclick="alert('敬请期待')">海边</div>
            <div onclick="alert('敬请期待')">湖边</div>
        </div>
    </aside>
    <article>
        <h2>浏览</h2>
        <div class="button" >
            <form name="filter" method="post">
            <select name="content" >
                <option>内容筛选</option>
                <option>黄昏</option>
                <option>海边</option>
                <option>湖边</option>
            </select>
            <select name="country" onchange="selectCity(this,this.form.city)">
                <option  value="0">国家筛选</option>
                <option value="1">美国</option>
                <option value="2">中国</option>
                <option value="3">日本</option>
            </select>
            <select name="city">
                <option value="0">城市筛选</option>
            </select>
            <button onclick="alert('敬请期待')">筛选</button>
            </form>
        </div>
        <section>
            <?php
            require_once('../config.php');
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
            if ( mysqli_connect_errno() ) {
                die( mysqli_connect_error() );
            }
            $sql = "select PATH from travelimage";
            $result = mysqli_query($connection, $sql);
            if($result)
                $totalCount = $result->num_rows;
            else
                $totalCount = 0;
            if($totalCount==0)
                echo "No users";
            else {
                $pageSize = 20;
                $totalPage = (int)(($totalCount % $pageSize == 0) ? ($totalCount / $pageSize) : ($totalCount / $pageSize + 1));

                if ($totalPage > 5)
                    $totalPage = 5;

                if (!isset($_GET['page']))
                    $currentPage = 1;
                else
                    $currentPage = $_GET['page'];

                $mark = ($currentPage - 1) * $pageSize;
                $firstPage = 1;
                $lastPage = $totalPage;
                $prePage = ($currentPage > 1) ? $currentPage - 1 : 1;
                $nextPage = ($totalPage - $currentPage > 0) ? $currentPage + 1 : $totalPage;

                $sql = "select PATH from travelimage limit " . $mark . "," . $pageSize;
                $result = mysqli_query($connection, $sql);
                for ($j = 0; $j < $pageSize; $j++) {
                    $row = mysqli_fetch_assoc($result);
                    echo '<div class="mypic">';
                    echo '<a href ="figure.php">';
                    echo '<img class="img" src="../travel-images/large/' . $row['PATH'] . '">';
                    echo '</a>';
                    echo '</div>';
                }

            }
            ?>
        </section>
        <div><div class="footer">
                <a href="lec05_sample27_Page.php?page=<?php echo $firstPage; ?>">1</a>
                &nbsp;&nbsp;
                <a href="lec05_sample27_Page.php?page=<?php echo $prePage; ?>"><<</a>
                &nbsp;&nbsp;
                <a href="lec05_sample27_Page.php?page=<?php echo $nextPage; ?>">>></a>
                &nbsp;&nbsp;
                <a href="lec05_sample27_Page.php?page=<?php echo $lastPage; ?>"> </a>
            </div></div>
    </article>
    </div>
    <footer>
        <div class="row">
            <p>Copyright © 2019-2020 Web fundamental. All Rights Reserved. 备案号：18307130374</p>
        </div>
    </footer>
</body>
<script type="javascript">
    var city=[["请选择市区","洛杉矶","华盛顿","纽约"],
    ["请选择市区","北京","上海","广州"],
    ["请选择市区","大阪","东京","京都"],
    ];
    function selectCity(coun,cit) {
        cov=coun.value;
        civ=cit.value;
        cit.length=1;
        if(cov==='0')
            return;
        if (city[cov]==='undefined')
            return;
        for(var i = 0;i < city[cov].length;i++)
        {
            cit.options[i + 1]=new Option();
        }
    }
</script>
</html>