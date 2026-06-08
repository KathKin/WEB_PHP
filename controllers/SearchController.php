<?php 
require_once "BaseSeriesTwigController.php";

class SearchController extends BaseSeriesTwigController{
  public $template = "search.twig";

  public function getContext(): array
  {
    $context = parent::getContext();

    $type = isset($_GET['type']) ? $_GET['type'] : '';
    $title = isset($_GET['title']) ? $_GET['title'] : '';
    $description = isset($_GET['description']) ? $_GET['description'] : '';

    $sql = <<<EOL
SELECT m_s.id, m_s.title, m_s.description
FROM m_s JOIN types on m_s.type_id = types.id
WHERE (:title = '' OR m_s.title like CONCAT('%', :title, '%'))
  AND (:type = '' OR types.type like CONCAT('%', :type, '%'))
  AND (:description = '' OR m_s.description like CONCAT('%', :description, '%'))
EOL;

    $query = $this->pdo->prepare($sql);
    $query->bindValue("title", $title);
    $query->bindValue("type", $type);
    $query->bindValue("description", $description);
    $query->execute();
    $context['type_sel'] = $type;
    $context['objects'] = $query->fetchAll();

    $query = $this->pdo->query("SELECT DISTINCT type FROM types order by 1");
    $types = $query->fetchAll();

    $context['types'] = $types;

    return $context;
  }
}