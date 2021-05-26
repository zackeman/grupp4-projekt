<?php
include 'header.php';
?>

<!-- Start Carousel-->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="bilder/snow.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Vinterdäck på köpet!</b></h5>
        <p>Köp en bil från oss redan idag, och få vinterdäcken på köpet!</p>
        <button type="button" class="btn btn-warning">Success</button>
      </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="bilder/audi-leasing.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Audi Q3</b></h5>
        <p>Nya Audi Q3, bättre, smartare och smidigare än någonsin! Köp idag!</p>
        <button type="button" class="btn btn-warning">Success</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="bilder/Dacia.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Dacia återförsäljare</b></h5>
        <p>Vi är stolta återförsäljare av bl.a. Dacia!</p>
        <button type="button" class="btn btn-warning">Success</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="bilder/rekond.jpg" alt="Fourth slide">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Ge din bil den kärleken den förtjänar!</b></h5>
        <p>Nu kan du lämna in din bil och få den rekondad, invändigt och utvändigt!</p>
        <button type="button" class="btn btn-warning">Success</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="bilder/kop-online.jpg" alt="Fifth slide">
      <div class="carousel-caption d-none d-md-block">
        <h5><b>Köp Online</b></h5>
        <p>Nu kan du köpa din bil online och få den levererad nästa dag!</p>
        <button type="button" class="btn btn-light">Success</button>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Tillbaka</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Nästa</span>
  </a>
</div>
<!-- Slut Carousel-->
<div class="row bg-light text-dark">
  <div class="col m-3 text-center">
    <h5><i class="icofont-money-bag"></i> Vi köper din bil!</h5>
    <p>Vi tar din bil som inbyte eller så köper vi din bil! </p>
  </div>
  <div class="col m-3 text-center">
    <h5><i class="icofont-car-alt-1"></i> Vi säljer bilar!</h5>
    <p>Kolla in vårt lager av alla bilar vi har i lager!</p>
  </div>
  <div class="col m-3 text-center">
    <h5><i class="icofont-bucket1"></i> Vi tvättar din bil!</h5>
    <p>Är din bil smutsig? Vi tvättar den och skyddar den!</p>
  </div>
</div>
<div class="container">

  <!-- Category Card -->
  <!-- 
      Funktionen showProducts visar de senast uppladdade
      bilarna(fyll i antal man vill visa som parameter genom $limit) (3st standard)
  -->
  <?php

  include "../src/functions.php";

  $orderBy = 'dateuploaded';
  $order = 'DESC';
  $limit = 3;

  showProducts($orderBy,
               $order,
               $limit);

  ?>

  <!-- Erbjudanden här-->
  <div class="container">
    <h3 class="text-center mt-3">ERBJUDANDEN</h3>
    <div class="row">
      <div class="card col-sm-7 pt-3 mr-3" style="width: 18rem;">
        <img class="card-img-top" src="bilder/biltvatt.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Köp en bil idag, så bjuder vi på rekond i 4 månader!</p>
        </div>
      </div>

      <div class="card col-sm-4 pt-3" style="width: 18rem;">
        <img class="card-img-top" src="bilder/glad-biltvatt.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Vi kan erbjuda en bra finansiering till dig som privatperson eller
            företagare vid köp av din bil (Nordea finans, Santander & DnB NoR finans). Vi skräddarsyr en finansiering som passar just dig! </p>
        </div>

      </div>
    </div>

    <!-- Erbjudanden slut-->

    <?php
    include 'footer.php';
    ?>