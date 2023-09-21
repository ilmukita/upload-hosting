<?php
require './connect-db.php'; // Impor (require) file koneksi.php

use MyApp\Database\Connection;

$mainPage = "http://localhost/demo";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id = $_POST['id'];
   $name = $_POST['name'];
   $address = $_POST['address'];

   if (!trim($name) || !trim($address)) {
      header('Location: ' . $mainPage);
   }

   $db = Connection::getInstance();
   $query = "UPDATE contacts SET name='%s', address='%s' WHERE id=%s;";
   $sql = sprintf($query, $name, $address, $id);
   if ($db->koneksi->query($sql)) {
      header('Location: ' . $mainPage);
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
} else {
   header('Location: ' . $mainPage);
}
