<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

$dsn="mysql:host=localhost;dbname=store;charset=utf8";
$pdo=new PDO($dsn, 'root', '');
$sql="UPDATE `item`
    ";
$pdo->exec($sql);   

header("Location: ../index.php");