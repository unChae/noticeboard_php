<?php
    require("dbconn.php");
    $title = isset($_REQUEST['title'])?$_REQUEST['title']:"";
    $writer = isset($_REQUEST['writer'])?$_REQUEST['writer']:"";
    $context = isset($_REQUEST['context'])?$_REQUEST['context']:"";

    $sql = "select count(*) as 'count' from board";
    $pstmt = $db->prepare($sql);
    $pstmt->execute();
    $row = $pstmt->fetch(PDO::FETCH_ASSOC);
    $count = intval($row['count']);

    if($title && $writer && $context){
        $sql = "insert into board values($count+1,'$context','$title','$writer',now(),0)";
        $pstmt = $db->prepare($sql);
        $pstmt->execute(); 
        echo "<script>alert('성공적으로 저장되었습니다.');</script>";
        echo "<script>location.replace('index.php');</script>";
    }else{
        header('location:'.$_SERVER['HTTP_REFERER']);
    }

?>