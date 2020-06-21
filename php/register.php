<?php
    require_once("../config.php");
echo 'this is excute';
    function checkuser()
    {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $sql = "SELECT * FROM traveluser WHERE UserName=:user";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':user', $_POST['user']);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            echo '<script>alert("用户名重复")</script>';
            $pdo = null;
            echo '<script>location.href="../src/register.php"</script>';
        } else {
            $time = date("y-m-d h:i:s", time());
            $sql = "INSERT INTO traveluser ( Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (:email,:user,:pass,1,:date,:date)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':email', $_POST['email']);
            $statement->bindValue(":user",$_POST['user']);
            $statement->bindValue(':pass', $_POST['pass']);
            $statement->bindValue(':date', $time);
            if($statement->execute())
                header("Location:../src/login.php");
            else {
                echo $statement->errorInfo()[2];
                $pdo = null;
                echo '<script>location.href="../src/register.php"</script>';
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        checkuser();
?>