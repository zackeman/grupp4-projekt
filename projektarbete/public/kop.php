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
        <option value="dateuploaded">Uppladdningsdatum</option>
      </select>
      <div class="input-group-append">
        <input class="btn btn-outline-secondary" type="submit" value="Sortera">
      </div>

    </form>
  </div>
</div>

<!-- Start produktsida -->
<?php

require_once '../src/db.php';
require '../src/functions.php';

/*
  Kolla ifall något har valts i sortera-rutan
  Om INTE så sorteras auto på productid
*/
if (empty($_GET)) {
  $orderBy = "productid";
  $order = 'ASC';
  $limit = 30;

  showProducts($orderBy, $order, $limit);
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {

  $orderBy = $_GET['orderby'];
  $order = 'ASC';
  $limit = 30;

  showProducts($orderBy, $order, $limit);
}

?>
<!-- Slut produktsida -->

<!-- Footer --->
<?php
include 'footer.php';
?>