<?php

require_once "MoviesController.php";

class MoviesInfoController extends MoviesController{
  public $template = "movies_info.twig";

  public function getContext(): array
  {
    $context = parent::getContext();

    $context['is_info'] = true;

    return $context;
  }
}