<?php

//Testa $_POST datan from form så att den inte innehåller felaktiga tecken etc.
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function showProducts($limit) {
    require_once "../src/db.php";


      $stmt = $pdo->prepare("SELECT * FROM products ORDER BY dateuploaded LIMIT $limit");
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
}
