<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if($_REQUEST['user_id']==''||$_REQUEST['user_pw']==''){
            echo "<script>alert('정확한 값을 입력하세요.');";
            echo "location.replace('login.php');</script>";				
        }
        $user_id = $_REQUEST['user_id'];
        $user_pw = $_REQUEST['user_pw'];
        try {
            $db = new PDO("mysql:host=localhost;dbname=test_db", "root", "1111");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pstmt = $db->prepare("select * from test where user_id='$user_id' and user_pw='$user_pw'");
            $pstmt->execute();
            $row = $pstmt->fetch(PDO::FETCH_ASSOC);
            if($row['user_name']==''){
                echo "<script>alert('아이디, 비밀번호를 확인해주세요.');</script>";
                echo "<script>location.replace(login.php);</script>";
            }
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            echo "<script>location.replace('index.php');</script>";				
        }catch(PDOException $e) {
            exit($e->getMessage());
        }
    ?>
</body>
</html>