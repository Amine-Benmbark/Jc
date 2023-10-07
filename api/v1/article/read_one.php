<?php
include_once "dbdata.inc.php";
include_once "functions.php";

$req_method = $_SERVER['REQUEST_METHOD'];
if($req_method !== 'GET') {
  sendHeaders('GET');
  header("HTTP/1.0 405 Method Not Allowed");
}

$pdo = getPDO($dbdata);

if(!$pdo) {
  sendHeaders('GET');
  header("HTTP/1.0 500 Error");
  $res = [
    'statusCode' => 500,
    'statusText' => 'Error',
    'message' => 'Unable to connect to Database.',
    'data' => [],
  ];
  echo json_encode($res, JSON_PRETTY_PRINT);
  exit();
}


$stmt = $pdo->prepare("SELECT * FROM article a, category c WHERE a.idTheme = c.id AND a.id=:id");

$stmt->bindParam (':id', $articleid, PDO::PARAM_INT);

try {
  $stmt->execute();
} catch(PDOException $err) {
  sendHeaders('GET');
  header("HTTP/1.0 500 Error");
  $res = [
    'statusCode' => 500,
    'statusText' => 'Error',
    'message' => $err,
    'data' => [],
  ];
  echo json_encode($res, JSON_PRETTY_PRINT);
  exit();
}

$data = $stmt->fetch();

sendHeaders('GET');
  header("HTTP/1.0 200 OK");
  $res = [
    'statusCode' => 200,
    'statusText' => 'OK',
    'message' => '',
    'data' => $data,
  ];
  echo json_encode($res, JSON_PRETTY_PRINT);
  exit();
