<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>銷售報表</title>
</head>

<body>
<h2>銷售報表</h2>

<?php
$dsn="mysql:host=localhost;dbname=store;charset=utf8";
$pdo=new PDO($dsn, 'root', '');
$sql="SELECT `items`.`name`,
             `items`.`price`,
	         SUM(`sales`.`quantity`) as `sales_count`,
	         SUM(`items`.`price`*`sales`.`quantity`)  as `total_sales`
         FROM `items`
    LEFT JOIN `sales` 
           ON `items`.`id`=`sales`.`item_id`
     GROUP BY `items`.`id`";
$reports=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
?>

<table>
    <tr>
        <td>品項</td>
        <td>個數</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
<?php
foreach($reports as $reports):
?>    
    <tr>
        <td><?=$reports['name'];?></td>
        <td><?=$reports['sales_count'];?></td>
        <td><?=$reports['price'];?></td>
        <td><?=$reports['total_sales'];?></td>
    </tr>
<?php
endforeach;
?>
</table>
</body>

</html>