

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplicacion Grupo 12</title>
</head>
<body>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<?php
$host = 'localhost';
$db   = 'cc3201';
$user = 'webuser';
$port = '5432';
$pass = 'Bot9zac';
$charset = 'utf-8';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn);
    if($pdo)
        echo "Connected to the <strong>$db</strong> database successfully!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>

<form action = "q2.php" method = "post">
	Team Initials: <input type = "text" name = "pais"><p>
	Year: <input type = "number" name = "year"><p>
	<input type = "submit">
</form>

<form action = "menu.php">
	<input type = "submit" value = "Return to Menu">
</form><p>

<?php

$year = $_POST["year"];
$pais2 = $_POST["pais"];
$pais = "%$pais2%";

$stmt =$pdo->prepare("SELECT distinct p.playername
	FROM worldcupplayers p, worldcupmatches m
	WHERE p.matchid = m.matchid
	AND m.year = :year
	AND p.teaminitials ILIKE :pais;");

$stmt->execute("year" => $year, "pais" => $pais);
$total_column = $stmt->columnCount();
for ($j = 0; $j < $total_column; $j ++) {
    $meta = $stmt->getColumnMeta($j);
    $labels[] = $meta['name'];i
}
echo '<table>';
echo "<tr>";
foreach ($labels as $key)
    echo "<th>".$key."</th>";
echo "</tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>";
    for($i=0;$i<$total_column;$i++){
        $valor=$row[$i];
        echo "<td>".$valor."</td>";
    }
}
echo "</tr>";
echo "</table>";
?>

</body>
</html>









JUGADORES DE LA SELECCION CHILENA EN EL MUNDIAL DEL 2014

select distinct p.playername
from worldcupplayers p, worldcupmatches m
where p.matchid = m.matchid
and m.year = 2014
and p.teaminitials = 'CHI';



