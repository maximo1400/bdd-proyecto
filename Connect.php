<?php
function connect(){
    $host = 'cc3201.dcc.uchile.cl';
    $db   = 'cc3201';
    $user = 'webuser';
    $port = '5412';
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
    return $pdo;
}

?>