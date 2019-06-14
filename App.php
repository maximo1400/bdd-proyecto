<?php
$host = 'cc3201.dcc.uchile.cl';
$db   = 'cc3201';
$user = 'cc3201';
$port = '5412';
$pass = 'Zac8bot';
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
$stmt =$pdo->prepare("SELECT * FROM g12.worldcups Limit 3");
$stmt->execute();
$total_column = $stmt->columnCount();

for ($j = 0; $j < $total_column; $j ++) {
    $meta = $stmt->getColumnMeta($j);
    $labels[] = $meta['name'];
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
