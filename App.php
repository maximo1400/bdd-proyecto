<?php
$host = 'cc3201.dcc.uchile.cl';
$db   = 'cc3201';
$user = 'webuser';
$port = '5412';
$pass = 'Bot9zac';
$charset = 'utf-8';

//$dsn = "pgsql:host=$host;dbname=$db;charset=$charset";
$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_COLUMN,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn);
    if($pdo)
        echo "Connected to the <strong>$db</strong> database successfully!";

} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
$stmt =$pdo->prepare("SELECT * FROM g12.worldcups;");
$stmt->execute();
$total_column = $stmt->columnCount();
var_dump($total_column);

for ($counter = 0; $counter < $total_column; $counter ++) {
    $meta = $stmt->getColumnMeta($counter);
    $column[] = $meta['name'];
}
print_r($column);


while ($row = $stmt->fetchAll(PDO::FETCH_NUM)){
    //print_r("<p>");
    for ($i = 0; $i <2; $i++){
        //$row->getAttribute($i);
        print("<pre>".print_r($row[$i],true)."</pre>");
    }
}


//try {
//    $pdo = new PDO('pgsql:host=cc3201.dcc.uchile.cl;port=5412;dbname=cc3201;user=cc3201;password=Zac8bot');
//    echo "PDO connection object created";
//    $stmt = $pdo->query('SELECT * FROM worldcups');
//    while ($row = $stmt->fetch())
//    {
//        print_r($row);
//    }
//}
//catch(PDOException $e)
//{
//    echo $e->getMessage();
//}

?>
