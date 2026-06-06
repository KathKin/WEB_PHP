<?php
$is_image = $url == '/movies/image';
$is_info = $url == '/movies/info';
?>

<h1>Здесь о фильмах</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?= $is_image ? "active" : '' ?>" aria-current="page" href="/movies/image">
      Картинка
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $is_info ? "active" : '' ?>" aria-current="page" href="/movies/info">
      Описание
    </a>
  </li>
</ul>

<?php
if ($is_image) {
  require "movies_image.php";
} elseif ($is_info) {
  require "movies_info.php";
}
?>