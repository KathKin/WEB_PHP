<?php


class BaseSeriesTwigController extends TwigBaseController{
  public function getContext(): array
  {
    $context = parent::getContext();

    $query = $this->pdo->query("SELECT DISTINCT type FROM m_s order by 1");
    $types = $query->fetchAll();
    $context['types'] = $types;

    return $context;
  }
}