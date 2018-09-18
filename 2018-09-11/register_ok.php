<?php
    $user_id = $_REQUEST['user_id'];
    $user_pw = $_REQUEST['user_pw'];
    $user_name = $_REQUEST['user_name'];

    require('dbconn.php');
    try{
        $sql = "insert into test values('$user_id','$user_pw','$user_name')";
        $pstmt = $db->prepare($sql);
        $pstmt->execute();
        echo "<script>alert('회원가입이 완료되었습니다.');</script>";
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        echo "<script>location.replace('index.php');</script>";
    }catch(PDOException $e){
        echo "<script>alert('아이디가 중복되었습니다.');</script>";
        echo "<script>history.back();</script>";
    }
?>