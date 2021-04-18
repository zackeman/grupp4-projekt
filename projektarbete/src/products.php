<?php

require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();


//
// Ifall man vill visa produkterna som tabell, men vi använder Bootstrap-cards
//
/* $table = '<table class="table">';
$table .= '<tr>
            <th>Tillverkare</th>
            <th>Modell</th>
            <th>År</th>
            <th>Beskrivning</th>
            <th>Pris</th>
           </tr>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $table .= '<tr>';
    $table .= '<td>' . $row['manufacturer'] . '</td>';
    $table .= '<td>' . $row['model'] . '</td>';
    $table .= '<td>' . $row['year'] . '</td>';
    $table .= '<td>' . $row['description'] . '</td>';
    $table .= '<td>' . $row['price'] . '</td>';
    $table .= '</tr>';
}
    
$table .= '</table>';
echo $table;
 */

while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $products[] = $product;
}


//
// Visa alla bilar i lager
//
echo 
  "<div class='container'>
  <br>
    <h4 class='text-center'>Nyinkomna bilar i lager!</h2>
      <br>
      <div class='row' id='ads'>";



foreach ($products as $product) {
    echo
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

echo "</div>
      </div>";
