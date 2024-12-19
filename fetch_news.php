<?php
require 'db.php';

$url = "https://agenciabrasil.ebc.com.br/rss/ultimasnoticias/feed.xml";

$rss = simplexml_load_file($url);

foreach ($rss->channel->item as $item) {
    $titulo = $item->title;
    $descricao = $item->description;
    $link = $item->link;
    $data_publicacao = date('Y-m-d H:i:s', strtotime($item->pubDate));

    // Verificando se a notícia já existe no banco
    $stmt = $pdo->prepare("SELECT * FROM noticias WHERE titulo = :titulo");
    $stmt->execute([':titulo' => $titulo]);

    if ($stmt->rowCount() == 0){
        // Inserindo no banco
        $stmt = $pdo->prepare("INSERT INTO noticias (titulo, descricao, link, data_publicacao) VALUES (?,?,?,?)");
        $stmt->execute([$titulo, $descricao, $link, $data_publicacao]);
    }
}

echo "Notícias importadas com sucesso!";
?>