<?php
require_once '../config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


$page = 'default';
if (!empty($_GET['page']) ) {
  $page = $_GET['page'];
}

$action = 'index';
if (!empty($_GET['action']) ) {
  $action = $_GET['action'];
}


$path ='../pages/' . $page . '/' . $action . '.php';

if (file_exists($path)) {
  include $path;
  exit;
}
else{
  include '../pages/errors/404.php';
}
