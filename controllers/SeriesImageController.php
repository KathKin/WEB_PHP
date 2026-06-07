<?php

require_once "SeriesController.php";

class SeriesImageController extends SeriesController
{
  public $template = "object_image.twig";

  public function getContext(): array
  {
    $context = parent::getContext();
    $context['is_image'] = true;
    $context['image_url'] = '/images/Series.webp';

    return $context;
  }
}