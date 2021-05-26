<?php

/*if (!isset($_GET['$id'])) {
    header('Location: index.php');
    exit;
}
*/



include_once 'header.php';
require_once '../src/functions.php';
require_once '../src/db.php';

$id = test_input($_GET['id']);

$sql = "SELECT * FROM products WHERE productID=:productID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':productID', $id);
$stmt->execute();

$product = $stmt->fetch();

$carmodel = $product['model'];
$carprice = $product['price'];
$caryear = $product['year'];
$carmiles = $product['miles'];
$carmanf = $product['manufacturer'];
$carreg = $product['regnr'];
$monthcost = 0.025;
$monthprice = $product['price'] * $monthcost;
?>

<div class="container">
  <div class="row mt-4">
    <div class="col-lg-8"> <img src="bilder/tesla-nyinkomna.jpg" class="img-fluid" alt="Bild">
    </div>
    <div class="col-lg-4">
      <h1 class="display-4"><?php echo $carmanf ?> <?php echo $carmodel ?> </h1>
      <p class="h6">Pris</p>
      <p class="h4"><strong><?php echo $carprice ?> kr
        </strong></p>
      <p class="h6">Månadskostnad</p>
      <p class="h4"><strong><?php echo $monthprice ?> kr
        </strong></p>
      <input type="button" onClick="document.getElementById('middle').scrollIntoView();" class="btn btn-primary btn-lg btn-block" value="Köp nu"></button>
    </div>
  </div>
</div>

<!-- Bil Data -->

<div class="accordion m-2" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Bilinformation
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul class="list-group">
          <li class="list-group-item">Modell: <?php echo $carmanf ?></li>
          <li class="list-group-item">Årsmodell: <?php echo $caryear ?></li>
          <li class="list-group-item">Miltal: <?php echo $carmiles ?></li>
          <li class="list-group-item">Registreringsnummer: <?php echo $carreg ?></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Slut bildata -->

  <div class="bg-light text-dark mt-3 p-3">
    <p class="lead text-center">
      Välkommen till AutoDec. Vi hjälper dig med allt kring ditt bilköp från att hitta drömbilen till att välja rätt finansiering. För mer information gällande detta fordon kontakta oss på AutoDec.
    </p>
  </div>
  <div id="middle">
    <div class="container">
      <h1 class="display-4 text-center mt-2">Sugen på bilen?</p>
        <p class="h6 text-center">Fyll i formuläret nedanför så kontaktar en säljare dig för vidare instruktioner!
        </p>
        <form action="process.php?id=<?php echo $id ?>" method="post" class="row text-center" enctype="multipart/form-data">
          <div class="col-md-6 m-2 center-block">
            <input name="firstname" type="text" required class="form-control" placeholder="Förnamn">
          </div>
          <div class="col-md-6 m-2">
            <input name="lastname" type="text" required class="form-control" placeholder="Efternamn">
          </div>
          <div class="col-md-6 m-2">
            <input name="email" type="email" required class="form-control" placeholder="E-post">
          </div>
          <div class="col-md-6 m-2">
            <input name="mobile" type="text" required class="form-control" placeholder="Mobilnummer">
          </div>
          <div class="col-md-12 m-2">
            <input type="submit" value="Kontakta mig!" class="btn btn-success form-control">
          </div>
    </div>