<?php
$is_image = $url == '/series/image';
$is_info = $url == '/series/info';
?>

<h1>Здесь о сериалах</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?= $is_image ? "active" : '' ?>" aria-current="page" href="/series/image">
      Картинка
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $is_info ? "active" : '' ?>" aria-current="page" href="/series/info">
      Описание
    </a>
  </li>
</ul>

<?php
if ($is_image) {
  require "series_image.php";
} elseif ($is_info) {
  require "series_info.php";
}
?>