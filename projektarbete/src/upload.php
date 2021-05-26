<?php
/*
      UPPLADNING UTAV BILDER
*/

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  
  /* Filnamnet */
  $filename = $_FILES['file']['name'];

  /* Plats filen sparas på */
  $location = "../public/bilder/".$filename;
  $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  /* Godkända bildformat */
  $valid_extensions = array("jpg","jpeg","png");

  $response = 0;
  /* Kolla om den uppladdade filen är av rätt typ enligt valid_extensions */
  if(in_array(strtolower($imageFileType), $valid_extensions)) {
     /* OM OK = Ladda upp */
     if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        $response = $location;
     }
  }
  echo $response;
  exit;
}