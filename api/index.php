<?php
$activeApiVersion = "v1";

$path = trim($_SERVER['REQUEST_URI']);

if($path[0] === '/') {
  $path = substr($path, 1);
}
if($path[strlen($path)-1] === '/') {
  $path = substr($path, 0, strlen($path)-1);
}

// echo $path."<br>";
$urlTable = explode("/", $path);
// echo "<br>";
$l = count($urlTable);
// echo $l;
// echo "<br>";
// var_dump($urlTable);
// echo "<br>";

if($path === "api/v1/article") {
  include ($activeApiVersion . '/article/read.php');
  exit();
}
if($path === "api/v1/article/new") {
  include ($activeApiVersion . '/article/create.php');
  exit();
}

if(strpos($path, "api/v1/article") !== false && $l === 4 && is_numeric($urlTable[$l-1])){
  $articleid = $urlTable[$l-1];
  include ($activeApiVersion . '/article/read_one.php');
  exit();
}

if(strpos($path, "api/v1/article/update") !== false && $l === 5 && is_numeric($urlTable[$l-1])) {
  $articleid = $urlTable[$l-1];
  include ($activeApiVersion . '/article/update.php');
  exit();
}

if(strpos($path, "api/v1/article/delete") !== false && $l === 5 && is_numeric($urlTable[$l-1])) {
  $articleid = $urlTable[$l-1];
  include ($activeApiVersion . '/article/delete.php');
  exit();
}

include ($activeApiVersion . '/notFound.php');

