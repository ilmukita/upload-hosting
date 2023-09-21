<?php
require './connect-db.php'; // Impor (require) file koneksi.php

use MyApp\Database\Connection;

$mainPage = "http://localhost/demo";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id = $_POST['id'];
   $db = Connection::getInstance();
   $sql = sprintf("DELETE FROM contacts WHERE id=%s;", $id);

   if ($db->koneksi->query($sql)) {
      header('Location: ' . $mainPage);
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
} else {
   header('Location: ' . $mainPage);
   exit;
}
