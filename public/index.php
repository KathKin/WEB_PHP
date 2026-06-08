<?php
session_set_cookie_params(60);
session_start();

require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/SearchController.php"; 
require_once "../controllers/SeriesObjectCreateController.php";
require_once "../controllers/SeriesTypeCreateController.php";   
require_once "../controllers/SeriesObjectDeleteController.php";
require_once "../controllers/SeriesObjectEditController.php";  
require_once "../middlewares/LoginRequiredMiddeware.php"; 
require_once "../middlewares/SessionFixMiddleware.php";
require_once "../controllers/SetWelcomeController.php";  
require_once "../controllers/LoginController.php";
require_once "../controllers/LogoutController.php";

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
$router->add("/", MainController::class)
    ->middleware(new SessionFixMiddleware());
$router->add("/m_s/(?P<id>\d+)?show=image", ObjectController::class)
    ->middleware(new SessionFixMiddleware());
$router->add("/m_s/(?P<id>\d+)?show=info", ObjectController::class)
    ->middleware(new SessionFixMiddleware());
$router->add("/m_s/(?P<id>\d+)", ObjectController::class)
    ->middleware(new SessionFixMiddleware());
$router->add("/search", SearchController::class)
    ->middleware(new SessionFixMiddleware());
$router->add("/set-welcome/", SetWelcomeController::class)
    ->middleware(new SessionFixMiddleware());

$router->add("/m_s/create", SeriesObjectCreateController::class)
    ->middleware(new LoginRequiredMiddeware())
    ->middleware(new SessionFixMiddleware());
$router->add("/m_s/createtype", SeriesTypeCreateController::class)
    ->middleware(new LoginRequiredMiddeware())
    ->middleware(new SessionFixMiddleware());
$router->add("/m_s/delete", SeriesObjectDeleteController::class)
    ->middleware(new LoginRequiredMiddeware())
    ->middleware(new SessionFixMiddleware());
$router->add("/m_s/(?P<id>\d+)/edit", SeriesObjectEditController::class)
    ->middleware(new LoginRequiredMiddeware())
    ->middleware(new SessionFixMiddleware());
$router->add("/login", LoginController::class);
$router->add("/logout", LogoutController::class);
$router->get_or_default(Controller404::class);