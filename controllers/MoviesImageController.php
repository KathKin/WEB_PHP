<?php
require_once "MoviesController.php";

class MoviesImageController extends MoviesController{
  public $template = "object_image.twig";

  public function getContext(): array
  {
    $context = parent::getContext();
    $context['image_url'] = '/images/movie_img.webp';
    $context['is_image'] = true;

    return $context;
  }
}