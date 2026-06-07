<?php

require_once "TwigBaseController.php";

class MoviesController extends TwigBaseController
{
  public $title = "Фильмы";
  public $template = "object.twig";

  public function getContext(): array
  {
    $context = parent::getContext();
    $context['url_title'] = "movies";
    return $context;
  }
}