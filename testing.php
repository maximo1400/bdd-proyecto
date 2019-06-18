<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplicacion Grupo 12</title>
    <link rel="stylesheet" type="text/css" href="theBling.css">
    <link rel="Connect" type="text/php" href="Connect.php">
    <link rel="print" type="text/php" href="printTable.php">
</head>
<body>

<?php
include "printTable.php";
include "Connect.php";
$pdo=Connect();
$stmt =$pdo->prepare("SELECT * FROM g12.worldcups Limit 3");
$stmt->execute();
$table =printTable($stmt);
echo $table;

?>
</body>
</html>

