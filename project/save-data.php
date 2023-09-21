<?php
require './connect-db.php'; // Impor (require) file koneksi.php

use MyApp\Database\Connection;

$mainPage = "http://localhost/demo";
$createPage = "http://localhost/demo/create-page.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $data = [];
   $name = $_POST['name'];
   $address = $_POST['address'];

   foreach ($name as $index => $_name) {
      $_address = $address[$index];
      if (trim($_name) && trim($_address)) {
         $contact = "('$_name', '$_address')";
         array_push($data, $contact);
      }
   }

   if (count($data)) {
      $db = Connection::getInstance();
      $sql = "INSERT INTO contacts (name, address) VALUES " . implode(',', $data) . ";";
      if ($db->koneksi->query($sql)) {
         header('Location: ' . $mainPage);
      } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }
   } else {
      header('Location: ' . $createPage);
   }
} else {
   header('Location: ' . $createPage);
}
