
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

<form action = "pg.php" method = "post">
		Country: <input type = "text" name = "pais"><p>
		<input type = "submit">
</form>

<p>
<form action ="menu.php">
		<input type = "submit" value = "Return to Menu">
</form><p>

<?php
$pais2 = $_POST["pais"];
$pais= "%$pais2%";

$stmt =$pdo->prepare("SELECT playername, COUNT(*)
	FROM (
	g12.worldcupmatches
	JOIN
	g12.worldcupplayers
	USING (matchid)
	)
	WHERE teaminitials ILIKE :pais
	GROUP BY playername
	ORDER BY COUNT DESC");
	
$stmt->execute(["pais" => $pais]);
$total_column = $stmt->columnCount();

for ($j = 0; $j < $total_column; $j ++) {
	$meta = $stmt->getColumnMeta($j);
	$labels[] = $meta['name'];
}

?>
<h2>World Cup Matches by players from <?php echo $pais2;?></h2>
<br>
<table><br>
<tr><br>
<?php
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