<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "products";

  try {
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e) {
    echo 'Connection Failed' . $e->getMessage() . "<br>";
    die();
  }

?>