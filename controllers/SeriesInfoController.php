<?php

require_once "SeriesController.php";

class SeriesInfoController extends SeriesController
{
  public $template = "series_info.twig";

  public function getContext(): array
  {
    $context = parent::getContext();
    $context['is_info'] = true;

    return $context;
  }
}