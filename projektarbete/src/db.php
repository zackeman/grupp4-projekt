<?php

    /* Connection till databasen
    
    kanske vill ändra setAttribute för att få den att visa info på annat sätt?

    T.ex. PDO::FECTH_GROUP för att få sorterat på bilmärken etc?
    Se länk:  https://phpdelusions.net/pdo/fetch_modes#FETCH_GROUP
    */

    $db_host = "localhost";
    $db_name = "autodec";
    $db_charset = "utf8mb4";

    $db_user = "root";
    $db_pass = "";

    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";

    try {
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Logged in";
    } catch 
        (\PDOException $e) {
            throw new \PDOException($e->getMessage());
    }
