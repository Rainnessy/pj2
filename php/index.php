<?php
require_once('../config.php');
    function output(){
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ='select * from travelimage order by rand() limit 7';
        $result = $pdo->query($sql);
        $row = $result->fetch();
        echo '<img class="header" src="../travel-images/large/' .$row['PATH'] .'">';
        while($row = $result->fetch()){
            echo '<div class="mypic">';
            echo '<a href ="../src/figure.php">';
            echo '<img class="img" src="../travel-images/large/' .$row['PATH'] .'">';
            echo  '</a>';
            echo '<div class="desc">'.$row['Description'].'</div>';
            echo '</div>';
        }

        $pdo = null;
    }
    output();
?>
