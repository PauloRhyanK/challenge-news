<?php
require 'db.php';

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
    <meta charset="UTF-8">
    <title>Notícias</title>
</head>
<body>
    <h1>Últimas Notícias</h1>
    <form method="GET">
        <input type="text" name="pesquisa" placeholder="Pesquisar notícias" value="<?= htmlspecialchars($termo) ?>">
        <button type="submit">Pesquisar</button>
    </form>
    <ul>
        <?php foreach ($noticias as $noticia): ?>
            <li>
                <a href="noticia.php?id=<?= $noticia['id'] ?>"><?= htmlspecialchars($noticia['titulo']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
