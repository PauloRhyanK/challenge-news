<?php
require 'db.php';

// Atualiza as notícias automaticamente
require 'fetch_news.php';

$termo = $_GET['pesquisa'] ?? '';
$query = "SELECT * FROM noticias";

if ($termo) {
    $query .= " WHERE titulo LIKE :termo OR descricao LIKE :termo";
}

$stmt = $pdo->prepare($query);
if ($termo) {
    $stmt->bindValue(':termo', "%$termo%");
}
$stmt->execute();

$noticias = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Notícias</title>
    <link rel="stylesheet" href="./styles.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <header>
      <h1>ChallengeNews</h1>
    </header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Início</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Ordenar
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Recentes</a></li>
                <li><a class="dropdown-item" href="#">Antigas</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search" method="GET">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Pesquisar Notícias"
              aria-label="Search"
              name="pesquisa"
              value="<?= htmlspecialchars($termo) ?>"
            />
            <button class="btn btn-outline-success" type="submit">
              Procurar
            </button>
          </form>
        </div>
      </div>
    </nav>
    <ul class="notice-list">
      <?php foreach ($noticias as $noticia): ?>
        <li class="">
          <div class="row g-0 bg-body-secondary position-relative">
            <div class="col-md-3 mb-md-0 p-md-4">
              <img src="<?= htmlspecialchars($noticia['imagem']) ?>" class="w-100 rounded" alt="Imagem da notícia"/>
            </div>
            <div class="col-md-6 p-4 ps-md-0">
              <h5 class="mt-0"><?= htmlspecialchars($noticia['titulo']) ?></h5>
              <a href="noticia.php?id=<?= $noticia['id'] ?>" class="stretched-link">Ler mais</a>
              <p class="card-text">
                <small class="text-body-secondary">Publicado dia <?= htmlspecialchars($noticia['data_publicacao']) ?></small>
              </p>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
    <script src="scripts.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <footer>
      <!-- ...existing footer code from pag.html... -->
    </footer>
  </body>
</html>
