<?php

require "../public/header.php";

//Hämta data från form i saljabil.php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    require_once '../src/db.php';

    // Skapa variabler av $_POST-data
    $firstName = test_input($_POST['firstname']);
    $lastName = test_input($_POST['lastname']);
    $email = test_input($_POST['email']);
    $manufacturer = test_input($_POST['manufacturer']);
    $model = test_input($_POST['model']);
    $year = test_input($_POST['year']);
    $miles = test_input($_POST['miles']);
    $regnr = test_input($_POST['regnr']);
    $description = test_input($_POST['description']);

    // Lägg in data i databasen
    $sql = "INSERT INTO products(
                    firstname,
                    lastname,
                    email,
                    manufacturer,
                    model,
                    year,
                    miles,
                    regnr,
                    description
                )
                VALUES (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                )";
                    

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
                $firstName,
                $lastName, 
                $email, 
                $manufacturer, 
                $model, 
                $year, 
                $miles, 
                $regnr, 
                $description]);

    echo "<p> $regnr har registrerats! </p>";
    
}


//Testa $_POST datan from form så att den inte innehåller felaktiga tecken etc.
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

require "../public/footer.php";
