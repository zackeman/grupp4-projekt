<?php
include_once 'header.php';
require_once '../src/functions.php';
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Testa att skriva ut POST-arrayen
  //print_r($_POST);

  $id = test_input($_GET['id']);

  $sql = "SELECT * FROM products WHERE $id=:productID";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':productID', $id);
  $stmt->execute();

  $product = $stmt->fetch();

  // print_r($product);

  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $email = htmlspecialchars($_POST['email']);
  $mobile = htmlspecialchars($_POST['mobile']);
}
?>

<?php

$stmt = $pdo->prepare("INSERT INTO kop
(fornamn, efternamn, epost, mobilnr, datum)
VALUES (:fornamn, :efternamn, :epost, :mobilnr, NOW()) ");

$stmt->bindParam(':fornamn', $firstname);
$stmt->bindParam(':efternamn', $lastname);
$stmt->bindParam(':epost', $email);
$stmt->bindParam(':mobilnr', $mobile);

$stmt->execute();

/*************************************
 * 
 * Skicka meddelandet via e-post
 * 
 ************************************/
$to = "mohammedabed@hotmail.com";
$subject = "Visat intresse av $firstname om bilen $product[manufacturer]";

// To send HTML mail, the Content-type header must be set
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=utf-8";

// Additional headers
$headers[] = "From: $firstname <$email>";
$headers[] = "Cc: $email"; // Skicka en kopia till kunden!

// Mail it
mail($to, $subject, implode("\r\n", $headers));

// Visa bekräftelse
$confirm = "<div class='container'>
   <h3>Tack $firstname!</h3>
   <p><strong>Vi kommer att återkomma så fort vi kan! Bilen du är intresserad av är $product[manufacturer] $product[model].
     Kolla gärna in våra andra bilar <a href='kop.php'>här!</a></strong></p>
  
  </div>
   ";

echo $confirm;

?>