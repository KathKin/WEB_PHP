<?php

class ObjectController extends BaseSeriesTwigController
{
  public $template = "object.twig";

  public function get(array $context)
  {
    if (isset($_GET['show'])) {
      if ($_GET['show'] == 'image') {
        $this->template = "image.twig";
      } else if ($_GET['show'] == 'info') {
        $this->template = "info.twig";
      }
    }
    
    parent::get($context);
  }

  public function getContext(): array
  {
    $context = parent::getContext();

    $query = $this->pdo->prepare("SELECT info, image, description, id, title FROM m_s WHERE id= :my_id");
    $query->bindValue("my_id", $this->params['id']);
    $query->execute();
    $data = $query->fetch();

    $context['image'] = $data['image'];
    $context['title'] = $data['title'];
    $context['description'] = $data['description'];
    $context['info'] = $data['info'];
    $context['id'] = $data['id'];
    $context['message'] = $_SESSION['welcome_message'] ?? 'Нет сообщения';
    $context["messages"] = isset($_SESSION['messages']) ? $_SESSION['messages'] : "";

    return $context;
  }
}