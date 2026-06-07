<?php
require_once "TwigBaseController.php";

class MainController extends TwigBaseController
{
  public $template = "main.twig";
  public $title = "Главная";
  public function getContext(): array
  {
    $context = parent::getContext();

    $context['menu_items'] = [
      ['url_title' => 'movies', 'title' => 'Фильмы'],
      ['url_title' => 'series', 'title' => 'Сериалы']
    ];

    return $context;
  }
}