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
              <a class="nav-link active" aria-current="page" href="index.php">Início</a>
            </li>
          </ul>
          <form class="d-flex" role="search" method="GET" action="index.php">
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
    <footer>
      <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">
          <div class="col-lg-3 mb-3">
            <h2>ChallengeNews</h2>
            <h5>Paulo Rhyan Kuster</h5>
          </div>
          <div class="col-6 col-lg-2 offset-lg-1 mb-3">
            <div>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-linkedin"
                viewBox="0 0 16 16"
              >
                <path
                  d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"
                />
              </svg>
              <a href="https://www.linkedin.com/in/paulorkuster/"
                >paulorkuster</a
              >
            </div>
            <div>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-github"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"
                />
              </svg>
              <a href="https://github.com/PauloRhyanK">PauloRhyanK</a>
            </div>
            <div>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-whatsapp"
                viewBox="0 0 16 16"
              >
                <path
                  d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"
                />
              </svg>
              <a
                href="https://whatsa.me/5527997289536/?t=Ol%C3%A1%20Paulo,%20tudo%20bem?"
                >(27) 99728-9536</a
              >
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
              </svg>
              </svg>
              <span>paulorhyak@gmail.com</span>
            </div>
          </div>
          <div class="col-6 col-lg-2 offset-lg-1 mb-3">
            <h5>Ferramentas:</h5>
            <ul>
              <li>HTML, CSS, JS e PHP</li>
              <li>bootstrap</li>
              <li>Git</li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    </div>
    <script src='./script.js'></script>
</body>
</html>