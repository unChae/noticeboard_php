<?php
    if($_REQUEST['user_id']==''||$_REQUEST['user_pw']==''){
        echo "<script>alert('값을 입력해 주세요.');</script>";
        echo "<script>location.replace('login.php');</script>";
    }
    $user_id = $_REQUEST['user_id'];
    $user_pw = $_REQUEST['user_pw'];
    require('dbconn.php');
    try {
        $pstmt = $db->prepare("select * from test where user_id='$user_id' and user_pw='$user_pw'");
        $pstmt->execute();
        $row = $pstmt->fetch(PDO::FETCH_ASSOC);
        if($row['user_name']==''){
            echo "<script>alert('아이디, 비밀번호를 확인해주세요.');</script>";
            echo "<script>location.replace(login.php);</script>";
        }
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_pw'] = $row['user_pw'];
        $_SESSION['user_name'] = $row['user_name'];
        echo "<script>location.replace('index.php');</script>";				
    }catch(PDOException $e) {
        exit($e->getMessage());
    }
?>