<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if(!$id){
    die("Noticias não encontrada!");
}

$stmt = $pdo->prepare("SELECT * FROM noticias WHERE id = ?");
$stmt->execute([$id]);
$noticia = $stmt->fetch();

if (!$noticia){
    die("Noticia não encontrada!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./styles.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($noticia['titulo']) ?></title>
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
              value=""
            />
            <button class="btn btn-outline-success" type="submit">
              Procurar
            </button>
          </form>
        </div>
      </div>
    </nav>
    <div class="noticia">
      <h1><?= htmlspecialchars($noticia['titulo']) ?></h1>
      <img src="<?= htmlspecialchars($noticia['imagem']) ?>" alt="Imagem da notícia" class="img-fluid">
      <p><?= nl2br($noticia['descricao']) ?></p>
      <p></p>
      <p>Data de publicação: <?= $noticia['data_publicacao'] ?></p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary me-md-2" type="button"><a href="index.php" class="btn btn-primary me-md-2">Voltar</a></button>
        <button class="btn btn-primary" type="button"> <a href="<?= htmlspecialchars($noticia['link']) ?>" class="btn btn-primary me-md-2" target="_blank">Leia mais</a></button>
      </div>

    </div>
</body>
</html>