<?php
include 'header.php';
?>
<!-- Header/Nav -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1 class="display-4 text-center mb-4">Kontakta oss</h1>

  <div class="container">
    <form action="#" method="post" class="row">
      <div class="col-md-6 m-2">
        <input name="name" type="text" required class="form-control" placeholder="Namn">
      </div>
      <div class="col-md-6 m-2">
        <input name="email" type="email" required class="form-control" placeholder="E-post">
      </div>
      <div class="col-md-12 m-2">
        <textarea name="message" cols="30" rows="5" required class="form-control" placeholder="Skriv ett meddelande"></textarea>
      </div>
      <div class="col-md-4">
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