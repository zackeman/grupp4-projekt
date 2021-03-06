<?php
include 'header.php';
require_once '../src/db.php';
?>
<!-- Slut på Header/Nav -->

<script src="../src/ajax-upload.js"></script>

<h1 class="display-4 text-center mb-4">Sälj din bil via oss</h1>

<div class="container">

    <p class="h6 text-center">Sugen på att sälja din bil? Vi köper gärna in din bil trots kondition på bilen. Och självklart för ett rimligt pris!<br><br>
        Fyll i formuläret nedanför så kontaktar vi dig med ett prisförslag!
    </p><br>

    <div class="container">
        <form action="../src/create.php" method="post" class="row" enctype="multipart/form-data" id="myform">
            <div class="col-md-6 m-2">
                <input name="firstname" type="text" required class="form-control" placeholder="Förnamn">
            </div>
            <div class="col-md-6 m-2">
                <input name="lastname" type="text" required class="form-control" placeholder="Efternamn">
            </div>
            <div class="col-md-6 m-2">
                <input name="email" type="email" required class="form-control" placeholder="E-post">
            </div>
            <div class="col-md-6 m-2">
                <input name="manufacturer" type="text" required class="form-control" placeholder="Tillverkare">
            </div>
            <div class="col-md-6 m-2">
                <input name="model" type="text" required class="form-control" placeholder="Modell">
            </div>
            <div class="col-md-6 m-2">
                <input name="year" type="text" required class="form-control" placeholder="Årsmodell">
            </div>
            <div class="col-md-6 m-2">
                <input name="miles" type="text" required class="form-control" placeholder="Antal mil">
            </div>
            <div class="col-md-6 m-2">
                <input name="regnr" type="text" required class="form-control" placeholder="Registreringsnummer">
            </div>
            <div class="col-md-12 m-2">
                <textarea name="description" cols="30" rows="5" required class="form-control" placeholder="Beskriv bilens skick, och annat om bilen"></textarea>
            </div>

            <!-- Bilduppladdning -->
            <div class="col-md-12 m-2">
                <div class='preview mb-2'>
                    <img src="" id="img" width="150" height="150">
                </div>
                <input type="file" id="file" name="file" />
                <input type="button" class="button" value="Ladda upp" id="but_upload">


            </div>

            <div class="col-md-12 m-2">
                <input type="submit" value="Skicka meddelandet" class="btn btn-success form-control">
            </div>
        </form>
    </div>

    <!-- Footer --->
    <?php
    include 'footer.php';
    ?>

    </body>

    </html>