<?php
require './connect-db.php'; // Impor (require) file koneksi.php

use MyApp\Database\Connection;

$mainPage = "http://localhost/demo";
$updateAction = "http://localhost/demo/update-data.php";

$id = '';
$name = '';
$address = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id = $_POST['id'];
   $db = Connection::getInstance();
   $sql = "SELECT * FROM contacts WHERE id=" . $id . ";";
   $result = $db->koneksi->query($sql);
   if ($result->num_rows < 1) {
      header('Location: ' . $mainPage);
   } else {
      $row = $result->fetch_assoc();
      $id = $row["id"];
      $name = $row["name"];
      $address = $row["address"];
   }
} else {
   header('Location: ' . $mainPage);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit</title>
   <link rel="stylesheet" href="index.css">
</head>

<body>
   <div class="container-center">
      <form id="dynamic-form" method="post" action="<?= $updateAction ?>">
         <div class="container-field">
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input class="input" type="text" name="name" placeholder="Name..." value="<?= $name ?>">
            <input class="input" type="text" name="address" placeholder="Address..." value="<?= $address ?>">
         </div>
         <a class="btn" href="<?= $mainPage ?>">Back</a>
         <button class="btn btn-submit" type="submit">Save</button>
      </form>
   </div>
</body>

</html>