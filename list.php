<?php

require_once 'config.php';

$keyword = $_GET['keyword'] ?? '';

$username = $_SESSION['username'] ?? '';

if (empty($username)) {
    header('Location: index.php');
}

$sql = "SELECT * FROM `users` WHERE `username` = '$username'";

$user = mysqli_query($conn, $sql);
$full_name = '';
if (mysqli_num_rows($user) > 0) {
    $row = mysqli_fetch_assoc($user);
    $full_name = $row['name'];
}

$sql = "SELECT * FROM `products` WHERE `name` LIKE '%$keyword%'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>

    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="search">
            <div class="information">
                <h1>名前: <strong><?= $full_name ?></strong></h1>
                <a href="./logout.php">ログアウト</a>
                <p>
                <span class="text-purple">SELECT</span> <span class="text-blue">*</span> <span class="text-purple">FROM</span> `<span class="text-pink">products</span>` <span class="text-purple">WHERE</span> `<span class="text-pink">name</span>` <span class="text-purple">LIKE</span> '<span class="text-orange">%<label id="keyword"><?php echo $keyword; ?></label>%</span>'
                </p>
            </div>
            <form action="" method="get">
                <input type="text" name="keyword" id="inp-keyword" placeholder="キーワード" value="<?php echo $keyword; ?>">
                <button type="submit">検索</button>
            </form>
            <div class="list-product">
                <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='item'>";
                            echo "<h3>" . $row['name'] . "</h3>";
                            echo "<p>" . number_format($row['price']) . " VND</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "結果が見つかりません。";
                    }
                ?>
            </div>
        </div>
    </div>

    <script>
        $(document).on('keyup', '#inp-keyword', function(event) {
            event.preventDefault();
            const keyword = $(this).val();
            $('#keyword').text(keyword);
        });
    </script>
</body>

</html>