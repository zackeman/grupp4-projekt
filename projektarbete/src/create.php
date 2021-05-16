<?php

require '../public/header.php';
require 'functions.php';

//Hämta data från form i saljabil.php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  require_once '../src/db.php';
  require_once '../src/upload.php';

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

  if (empty($_FILES)) {
    $img = 'no-image.jpg';
  } else {
    $img = ($_FILES['name']);
  }


  echo "
    <div class='container'>
      <div class='row' id='ads'>
        <!-- Category Card -->
        <div class='col-md-4'>
          <div class='card rounded'>
            <div class='card-image'>
              <span class='card-notify-badge'>$manufacturer $model</span>
  
              <img class='img-fluid' src='../public/bilder/tesla-nyinkomna.jpg' alt='Alternate Text' />
            </div>
            <div class='card-image-overlay m-auto'>
              <span class='card-detail-badge bg-warning'>$year</span>
              <span class='card-detail-badge bg-warning'></span>
              <span class='card-detail-badge bg-warning'>$miles mil</span>
            </div>
            <div class='card-body text-center'>
              <div class='ad-title m-auto'>
                <h5>$model</h5>
              </div>
              <a class='ad-btn' href='#'>Köp nu</a>
            </div>
          </div>
        </div>
        ";

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
  ]);

  echo "<p class='alert'> <h3> $regnr har registrerats! </h3></p>
          <p>Du blir omdirigerad till startsidan inom 2 sekunder.</p>";

  //header("refresh:2;url=../public/index.php");
  echo "<meta content='2; URL = ../public/index.php' http-equiv='Refresh' />";
}

require "../public/footer.php";
