<?php

require_once "../src/create.php";
/*

      UPPLADNING UTAV BILDER

*/

function validateImage($img)
{

  $message = '';
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png');

    if (in_array($fileExtension, $allowedfileExtensions)) {
      // directory in which the uploaded file will be moved
      $uploadFileDir = "../public/bilder/uploads";
      $img_path = $uploadFileDir . $newFileName;

      if (move_uploaded_file($fileTmpPath, $img_path)) {
        $message = 'Bilden laddades upp korrekt.';
        $img = $img_path;
      } else {
        $message = 'Det gick fel när filen flyttades till rätt mapp. Se till att mappen är tillgänglig hos webbservern.';
      }
    } else {
      $message = 'Uppladdningen misslyckas, fel format: ' . implode(',', $allowedfileExtensions);
    }
  } else {
    $message = 'Det blev något fel med bilduppladningen. Se fel.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
