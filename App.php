<?php
$host = 'cc3201.dcc.uchile.cl';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


HOST = "cc3201.dcc.uchile.cl";
PORT = "5412";
DATABASE = "cc3201";
CONNECTION_URL = "jdbc:postgresql://"+HOST+":"+PORT+"/"+DATABASE;
USERNAME = "cc3201";
PASSWORD = "Zac8bot";
SSL = "true";

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
