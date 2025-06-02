<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯品項</title>
</head>

<body>
    <h1>編輯品項</h1>
    <?php
    $dsn = "mysql:host=localhost;dbname=school;charest=utf8";
    $pdo = new PDO($dsn, 'root', '');
    $id = $_GET['id'] ?? 0;
    $item = $pdo->query("SELECT * FROM items WHERE id='$id")->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="./api/add_item.php" method="post">
        <label for="name">品項名稱:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">價格:</label>
        <input type="number" name="price" id="price" required>
        <br>
        <label for="name">成本:</label>
        <input type="text" name="cost" id="name" required>
        <br>
        <label for="price">庫存:</label>
        <input type="number" name="stock" id="price" required>
        <br>
        <button type="submit">編輯</button>
    </form>
</body>

</html>