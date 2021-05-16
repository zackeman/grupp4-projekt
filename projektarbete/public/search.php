<?php

require 'header.php';


//
// OM sökrutan med name="search" är submittad så skickas arrayen med $_GET data till $searchstring
// Hämta söksträng från GET så att den syns i URL och kan kopieras
//
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    require '../src/db.php';
    require '../src/functions.php';

    $searchstring = test_input($_GET['search']);

    /*
        SELECT Bara ord från kolumnerna
        tillverkare & modell om de "LIKE"(liknar) $searchstring
    */
    $stmt = $pdo->prepare("SELECT * FROM products
                                WHERE  manufacturer LIKE '%$searchstring%'
                                           OR model LIKE '%$searchstring%'");
    $stmt->execute();

    // Gör en assoc array utav data den har selectat från ovan
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $result;
    }

    // Om den inte hittar några resultat så skriver den ut detta
    if (empty($results)) {
        echo "<div class='container'>
        <br>
        <h4 class='text-center'>Vi hittade tyvärr inga produkter som stämmer överens med <i>$searchstring</i></h2>";
    }
    else {
        //
        // Visa bilar i lager som stämmer överens med söksträngen
        //
        $cards =
            "<div class='container'>
            <br>
            <h4 class='text-center'>Sökresultat för <i>$searchstring</i></h2>
            <br>
            <div class='row' id='ads'>";


        foreach ($results as $result) {
            $cards .=
                "<div class='col-md-4'>
                <div class='card rounded'>
                <div class='card-image'>
                    <span class='card-notify-badge'>$result[manufacturer] $result[model]</span>

                    <img class='img-fluid' src='bilder/$result[model]' alt='Ingen bild tillgänglig'/>
                </div>
                <div class='card-image-overlay m-auto'>
                    <span class='card-detail-badge bg-warning'>$result[year]</span>
                    <span class='card-detail-badge bg-warning'>$result[price] kr</span>
                    <span class='card-detail-badge bg-warning'>$result[miles] mil</span>
                </div>
                <div class='card-body text-center'>
                    <div class='ad-title m-auto'>
                    <h5>$result[model]</h5>
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
}




include 'footer.php';
