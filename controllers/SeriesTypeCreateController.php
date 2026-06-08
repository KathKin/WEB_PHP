<?php
require_once "BaseSeriesTwigController.php";

class SeriesTypeCreateController extends BaseSeriesTwigController
{
  public $template = "series_create_type.twig";
  public function get(array $context)
  {

    parent::get($context);
  }
  public function post(array $context)
  {

    $type = $_POST['type'];

    $tmp_name = $_FILES['image']['tmp_name'];
    $name =  $_FILES['image']['name'];

    move_uploaded_file($tmp_name, "../public/media/$name");
    $image_url = "/media/$name";

    $sql = <<<EOL
INSERT INTO types(type, image)
VALUES(:type, :image_url)
EOL;


    $query = $this->pdo->prepare($sql);

    $query->bindValue("type", $type);
    $query->bindValue("image_url", $image_url);

    $query->execute();

    $context['message'] = 'Вы успешно создали объект';
    $context['id'] = $this->pdo->lastInsertId();

    $this->get($context);
  }
}