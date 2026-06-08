<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/MoviesController.php";
require_once "../controllers/MoviesImageController.php";
require_once "../controllers/MoviesInfoController.php";
require_once "../controllers/SeriesController.php";
require_once "../controllers/SeriesImageController.php";
require_once "../controllers/SeriesInfoController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/InfoController.php";
require_once "../controllers/ImageController.php";

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

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/movies", MoviesController::class);
$router->add("/m_s/(?P<id>\d+)/image", ImageController::class); 
$router->add("/m_s/(?P<id>\d+)/info", InfoController::class);
$router->add("/m_s/(?P<id>\d+)", ObjectController::class); 
$router->get_or_default(Controller404::class);