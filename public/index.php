<?php
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/MoviesController.php";
require_once "../controllers/MoviesImageController.php";
require_once "../controllers/MoviesInfoController.php";
require_once "../controllers/SeriesController.php";
require_once "../controllers/SeriesImageController.php";
require_once "../controllers/SeriesInfoController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
    "debug" => true 
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$url = $_SERVER["REQUEST_URI"];
$title = "";
$template = "";
$context = [];

$controller = new Controller404($twig);

$pdo = new PDO("mysql:host=127.0.0.1;dbname=movie_series;charset=utf8", "root", "");

if ($url == "/") {
  $controller = new MainController($twig);
} elseif (preg_match("#^/movies/image#", $url)) {
  $controller = new MoviesImageController($twig);
} elseif (preg_match("#^/movies/info#", $url)) {
  $controller = new MoviesInfoController($twig);
} elseif (preg_match("#^/movies#", $url)) {
   $controller = new MoviesController($twig);
} elseif (preg_match("#^/series/image#", $url)) {
  $controller = new SeriesImageController($twig);
} elseif (preg_match("#^/series/info#", $url)) {
  $controller = new SeriesInfoController($twig);
} elseif (preg_match("#^/series#", $url)) {
  $controller = new SeriesController($twig);
}

if ($controller) {
  $controller->setPDO($pdo);
  $controller->get();
}