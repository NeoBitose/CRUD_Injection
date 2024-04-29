<?php 

$url = 'http://localhost/CRUD_Injection';
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_crud_inject';
try {
  $conn = new mysqli($host, $username, $password, $database);
} catch (\Throwable $e) {

  header('Location: http://localhost/views/errors/500.php?message="'.$e.'"');
}

