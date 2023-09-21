<?php

namespace MyApp\Database;

use mysqli;

class Connection
{
   private $server = "localhost";
   private $username = "root";
   private $password = "";
   private $database = "booklet";
   private static $instance; // Instance tunggal
   public $koneksi;

   // Metode konstruktor private agar tidak bisa langsung diakses
   private function __construct()
   {
      $this->koneksi = new mysqli($this->server, $this->username, $this->password, $this->database);

      if ($this->koneksi->connect_error) {
         die("Koneksi gagal: " . $this->koneksi->connect_error);
      }
   }

   // Metode untuk mendapatkan instance Singleton
   public static function getInstance()
   {
      if (!self::$instance) {
         self::$instance = new Connection();
      }
      return self::$instance;
   }

   // Metode untuk mencegah duplikasi koneksi
   public function __clone()
   {
      trigger_error("Cloning of this class is not allowed.", E_USER_ERROR);
   }
}
