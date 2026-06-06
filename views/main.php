<ul class="list-group">
  <li class="list-group-item">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link <?= $url ? "active" : '' ?>" aria-current="page" href="/series">
          Фильмы
        </a>
      </li>
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
  </li>
  <li class="list-group-item">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link <?= $url ? "active" : '' ?>" aria-current="page" href="/movies">
            Сериалы
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $is_img ? "active" : '' ?>" aria-current="page" href="/movies/image">
            Картинка
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $is_info ? "active" : '' ?>" aria-current="page" href="/movies/info">
            Описание
        </a>
      </li>
    </ul>
  </li>
</ul>