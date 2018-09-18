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
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
    ?>
    <form action="login_ok.php" method="POST">
        아이디<input type="text" name="user_id" placeholder="아이디"></br>
        비밀번호<input type="password" name="user_pw" placeholder="비밀번호">
        <input type="submit">
    </form>
    <?php
        } else {
            echo "이미 로그인 된 상태입니다.";
            echo "<a href='index.php'>돌아가기</a>";
            echo "<a href='logout.php'>로그아웃</a>";
        }
    ?>
</body>
</html>