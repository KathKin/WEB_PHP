<?php

class InfoController extends TwigBaseController
{
  public $template = "info.twig";

  public function getContext(): array
  {
    $context = parent::getContext();
    $query = $this->pdo->prepare("SELECT description, info, id, title FROM m_s WHERE id= :my_id");
  
    $query->bindValue("my_id", $this->params['id']);
    $query->execute();

  
    $data = $query->fetch();
    $context['info'] = $data['info'];
    $context['title'] = $data['title'];
    $context['description'] = $data['description'];
    $context['id'] = $data['id'];

    return $context;
  }
}