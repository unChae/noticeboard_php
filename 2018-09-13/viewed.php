<?php
    require_once("dbconn.php");
    $id = $_REQUEST['id'];
    $viewed = $_REQUEST['viewed'];

    $upViewed = $viewed + 1;

    $sql = "update board set viewed = $upViewed where id = $id";
    $pstmt = $db->prepare($sql);
    $pstmt->execute();

    echo "<script>location.replace('print.php?id=$id');</script>";
?>