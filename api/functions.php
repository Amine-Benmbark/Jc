<?php
// Fonctions PDO
function getPDO($DBinfo) {
  $dsn = $DBinfo["driver"]
      . ":host=" . $DBinfo["serveur"]
      . ";port=" . $DBinfo["port"]
      . ";dbname=" . $DBinfo["base"]
      . ";charset=" . $DBinfo["charset"];
  $user = $DBinfo["user"];
  $pwd = $DBinfo["pass"];
  $options = $DBinfo["options"];

  try {
      $pdo = new PDO($dsn, $user, $pwd, $options);
  }
  catch (PDOException $e) {
      return false;
  }
  return $pdo;
}

function sendHeaders($methods) {
  header("Access-Control-Allow-Origin: *"); 
  header("Access-Control-Allow-Methods: " . $methods . ", OPTIONS"); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header("Content-Type: application/json");
}