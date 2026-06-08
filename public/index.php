<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/SearchController.php"; 
require_once "../controllers/SeriesObjectCreateController.php";
require_once "../controllers/SeriesTypeCreateController.php";   
require_once "../controllers/SeriesObjectDeleteController.php";

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
$router->add("/m_s/(?P<id>\d+)", ObjectController::class);
$router->add("/m_s/(?P<id>\d+)?show=image", ObjectController::class); 
$router->add("/m_s/(?P<id>\d+)?show=info", ObjectController::class);  
$router->add("/search", SearchController::class);
$router->add("/m_s/create", SeriesObjectCreateController::class);
$router->add("/m_s/createtype", SeriesTypeCreateController::class);
$router->add("/m_s/delete", SeriesObjectDeleteController::class);
$router->get_or_default(Controller404::class);