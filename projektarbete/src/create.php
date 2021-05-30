<?php

header("refresh:2;url=../public/index.php");

require '../public/header.php';
require 'functions.php';

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
  $img = "";

  if($_FILES['file']['error'] == 0) {
    $img = ($_FILES['file']['name']);
  }

  if ($_FILES['file']['error'] == 4) {
    $img = 'no-image.jpg';
  }

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
                    description,
                    image,
                    dateuploaded
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
                    ?,
                    ?,
                    NOW() 
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
    $description,
    $img
  ]);

  echo "<div class='col-sm-4'>
          <p class='alert'> <h3> $regnr har registrerats! </h3></p>
          <p>Du blir omdirigerad till startsidan inom 2 sekunder.</p>
        </div>";
}

require "../public/footer.php";
