<?php

//Testa $_POST datan from form så att den inte innehåller felaktiga tecken etc.
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// Visa produkter sorterat efter vad man väljer att sortera i kop.php samt i vilken ordning
function showProducts($orderBy, $order, $limit)
{
    require "../src/db.php";

    //
    // Strängen för en int(LIMIT i dettta fall) konverteras fel så länge PDO:EMULATION är aktiv vid
    // prepared statements och man vill binda värdet efteråt i en array
    // 
    // !! har lagt in variabeler direkt i queryn trots att det inte skall göras, men fungerar i detta fall...
    //
    // för info angående fel se länk: https://phpdelusions.net/pdo#limit

    /* Another problem is related to the SQL LIMIT clause.
    When in emulation mode (which is on by default),
    PDO substitutes placeholders with actual data, instead of sending it separately.
    And with "lazy" binding (using array in execute()),
    PDO treats every parameter as a string. As a result,
    the prepared LIMIT ?,? query becomes LIMIT '10', '10' which is invalid syntax that causes query to fail. */


    $sql = "SELECT * FROM products
             ORDER BY $orderBy $order LIMIT $limit";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(/* [$orderBy, $order] */);

    // Testa om rätt parametrar skickas till databasen
    /*  echo "<pre>";
    $stmt->debugDumpParams();
    echo "</pre>"; */


    while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $product;
    }

    //
    // Visar varje SELECTED product som ett card 
    //

    $cards =
        "<div class='container'>
        <br>
            <div class='row' id='ads'>";


    foreach ($products as $product) {
        $cards .=
            "<div class='col-md-4'>
          <div class='card rounded'>
            <div class='card-image'>
              <span class='card-notify-badge'>$product[manufacturer] $product[model] $orderBy</span>
          
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
