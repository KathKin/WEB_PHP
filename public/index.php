<?php
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];
$title = "";
$template = "";
$context = [];
if ($url == "/") {
  $template = "main.twig";
  $title = "Главная";
  $context['menu_items'] = [
    [
      "title" => "Фильмы",
      "url_title" => "movies"
    ],
    [
      "title" => "Сериалы",
      "url_title" => "series"
    ]
  ];
} elseif (preg_match("#^/movies#", $url)) {
  $template = "object.twig";
  $title = "Фильмы";
  $context['url_title'] = "movies";
  $is_image = $url == "/movies/image";
  $is_info = $url == "/movies/info";
  $context['is_info'] = $is_info;
  $context['is_image'] = $is_image;

  if($is_image){
    $template = "object_image.twig";
    $context['image_url'] = '/images/movie_img.webp';
  } elseif($is_info){
    $template = "movies_info.twig";
  }

} elseif (preg_match("#^/series#", $url)) {
  $template = "object.twig";
  $title = "Сериалы";
  $context['url_title'] = "series";

  $is_image = $url == "/series/image";
  $is_info = $url == "/series/info";

  $context['is_info'] = $is_info;
  $context['is_image'] = $is_image;


  if($is_image){
    $template = "object_image.twig";
    $context['image_url'] = '/images/Series.webp';
  }
  elseif($is_info){
    $template = "series_info.twig";
  }
}

$context['title'] = $title;

echo $twig->render($template, $context);