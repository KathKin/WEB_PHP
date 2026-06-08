<?php

require_once "BaseSeriesTwigController.php";

class MainController extends BaseSeriesTwigController
{
  public $template = "main.twig";
  public $title = "Главная";
  public function getContext(): array
  {
    $context = parent::getContext();

        if(isset($_GET['type'])){
      $query = $this->pdo->prepare("SELECT * FROM m_s JOIN types ON m_s.type_id = types.id WHERE types.type = :type");
      $query->bindValue("type", $_GET['type']);
      $query->execute();
    }
    else {
      $query = $this->pdo->query("SELECT * FROM m_s");
    }

    $context['m_s'] = $query->fetchAll();
    return $context;
  }
}