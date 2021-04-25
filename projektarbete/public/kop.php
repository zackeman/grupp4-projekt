<?php
include 'header.php';
?>
<!-- Slut navigation -->

<!-- Listruta för att välja sortering -->


<div class="row mb-0">
  <div class="input-group col-md-2 float-end">
    <form class="float-end" action="#" method="GET" id="carform">
      <label for="carform"></label>
      <select class="custom-select" id="carform" name="orderby">
        <option value="manufacturer">Tillverkare</option>
        <option value="model">Modell</option>
        <option value="price">Pris</option>
        <option value="year">Årsmodell</option>
      </select>
      <div class="input-group-append">
        <input class="btn btn-outline-secondary" type="submit" value="Sortera">
      </div>

    </form>
  </div>
</div>

<!-- Start produktsida -->
<?php

require '../src/db.php';
/*
  Kolla ifall något har valts i sortera-rutan
  Om INTE så sorteras auto på productid
*/
if (empty($_GET)) {
  $orderBy = "productid";
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {

  $orderBy = $_GET['orderby'];
  echo "<META HTTP-EQUIV='Refresh'>";
}

$stmt = $pdo->prepare("SELECT * FROM products ORDER BY $orderBy");
$stmt->execute();


while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $products[] = $product;
}

//
// Visa alla bilar i lager
//

$cards =
  "<div class='container'>
  <br>
    <h4 class='text-center'>Nyinkomna bilar i lager!</h2>
      <br>
      <div class='row' id='ads'>";



foreach ($products as $product) {
  $cards .=
    "<div class='col-md-4'>
    <div class='card rounded'>
      <div class='card-image'>
        <span class='card-notify-badge'>$product[manufacturer] $product[model]</span>
    
        <img class='img-fluid' src='bilder/tesla-nyinkomna.jpg' alt='Alternate Text' />
      </div>
      <div class='card-image-overlay m-auto'>
        <span class='card-detail-badge bg-warning'>$product[year]</span>
        <span class='card-detail-badge bg-warning'>$product[price] kr</span>
        <span class='card-detail-badge bg-warning'>$product[miles] mil</span>
      </div>
      <div class='card-body text-center'>
        <div class='ad-title m-auto'>
          <h5>$product[model]</h5>
        </div>
        <a class='ad-btn' href='#'>Köp nu</a>
      </div>
    </div>
    </div>";
}

echo "$cards
    </div>
</div>";
?>
<!-- Slut produktsida -->

<!-- Footer --->
<?php
include 'footer.php';
?>