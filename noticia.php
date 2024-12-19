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
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($noticia['titulo']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($noticia['titulo']) ?></h1>
    <img src="<?= htmlspecialchars($noticia['imagem']) ?>" alt="Imagem da notícia" style="max-width: 100%; height: auto;">
    <p><?= nl2br(htmlspecialchars($noticia['descricao'])) ?></p>
    <p><a href="<?= htmlspecialchars($noticia['link']) ?>" target="_blank">Leia mais</a></p>
    <p>Data de publicação: <?= $noticia['data_publicacao'] ?></p>
    <a href="index.php">Voltar</a>
</body>
</html>