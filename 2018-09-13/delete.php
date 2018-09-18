<?php
    require_once("dbconn.php");
    //세션에 저장되어 있는 id, name 값과 writer의 값을 비교한 뒤에 삭제를 시켜 줘야됨.
    $id = $_REQUEST['id'];
    $sql = "delete from board where id = $id";
    $pstmt = $db->prepare($sql);
    $pstmt->execute();

    $sql = "update board set id = id - 1 where id > $id";
    $pstmt = $db->prepare($sql);
    $pstmt->execute();

    echo "<script>location.href='index.php'</script>";
?>