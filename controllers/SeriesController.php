<?php

//require_once "TwigBaseController.php";

class SeriesController extends TwigBaseController
{
  public $title = "Сериалы";
  public $template = "object.twig";

  public function getContext(): array
  {
    $context = parent::getContext();
    $context['url_title'] = "series";
    return $context;
  }
}