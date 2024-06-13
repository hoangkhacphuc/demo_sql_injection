<?php

require_once 'config.php';

$username = $_SESSION['username'] ?? '';

if (! empty($username)) {
    header('Location: list.php');
}

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        echo "<script>alert('全てのフィールドを入力してください。');</script>";
    } else {
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            echo "<script>alert('ログインに成功しました。');</script>";
        } else {
            echo "<script>alert('ログインに失敗しました。');</script>";
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
                <img src="./bg.png" alt="Background">
            </div>
            <div class="block">
                <form action="" method="post">
                    <h2>ログイン</h2>
                    <input type="text" name="username" placeholder="アカウント名 (Username)" required>
                    <input type="password" name="password" placeholder="パスワード (Password)" required>
                    <a href="./register.php">新規登録</a>
                    <button type="submit" name="login">ログイン</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>