<!DOCTYPE html>
<html lang="sv">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>AutoDec - Körglädje för allihopa!</title>

  <link rel="stylesheet" href="../vendors/Bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="icofont/icofont.min.css">
  <link rel="stylesheet" href="icofont/icofont.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js"></script>
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  
</head>

<body>
  <!-- Topbar -->
  <div class="alert alert-warning m-0 text-center">
    På grund av rådande pandemi, kan leveranser bli sent leverererade.
  </div>
  <!--Topbar slut -->

  <!--Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
    <a class="navbar-brand" href="index.php">AutoDec</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Hem <span class="sr-only">(current)</span></a>
        </li>
        <a class="nav-link" href="kop.php">Se våra bilar i lager <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="saljabil.php">Vi köper din bil <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="kontakt.php">Kontakta oss <span class="sr-only">(current)</span></a>
        <li class="nav-item">
          <a class="nav-link" href="rekond.php">Rekond</a>
        </li>
        <li class="nav-item dropdown">
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>

      <!-- SÖKRUTA -->
      <form class="form-inline my-2 my-lg-0" action='search.php' method="GET">
        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Sök" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sök</button>
      </form>

    </div>
  </nav>
  <!-- Slut navigation -->