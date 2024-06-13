<?php

require_once 'config.php';

$username = $_SESSION['username'] ?? '';

if (! empty($username)) {
    header('Location: list.php');
}


if (isset($_POST['register'])) {
    $full_name = $_POST['full-name'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm-password'] ?? '';
    
    if (empty($full_name) || empty($username) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('全てのフィールドを入力してください。');</script>";
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('パスワードが一致しません。');</script>";
    } else {
        if (mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'")) {
            echo "<script>alert('このアカウント名は既に使用されています。');</script>";
        } else {
            $password = md5($password);
            $sql = "INSERT INTO users (name, username, password) VALUES ('$full_name', '$username', '$password')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['username'] = $username;
                echo "<script>alert('新規登録に成功しました。');</script>";
            } else {
                echo "<script>alert('エラーが発生しました。');</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>

    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <div class="block">
                <div class="content">
                    <span>トピック</span>
                    <h1>SQLインジェクション</h1>
                    <div class="line"></div>
                    <ul>
                        <li>Nguyễn Tuấn Anh</li>
                        <li>Lê Phú An</li>
                        <li>Nguyễn Văn Doanh</li>
                        <li>Hoàng Khắc Phúc</li>
                        <li>Nguyễn Phương Nga</li>
                    </ul>
                </div>
                <img src="./bg2.png" alt="Background">
            </div>
            <div class="block">
                <form action="" method="post" class="register">
                    <h2>新規登録</h2>
                    <input type="text" name="full-name" placeholder="名前 (Fullname)" required>
                    <input type="text" name="username" placeholder="アカウント名 (Username)" required>
                    <input type="password" name="password" placeholder="パスワード (Password)" required>
                    <input type="password" name="confirm-password" placeholder="パスワード確認 (Confirm Password)" required>
                    <a href="./">ログイン</a>
                    <button type="submit" name="register">新規登録</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>