<?php
require 'db.php';

$url = "https://agenciabrasil.ebc.com.br/rss/ultimasnoticias/feed.xml";

$rss = simplexml_load_file($url);

foreach ($rss->channel->item as $item) {
    $titulo = (string) $item->title;
    $descricao = (string) $item->description;
    $link = (string) $item->link;
    $imagem = isset($item->{'imagem-destaque'}) ? (string) $item->{'imagem-destaque'} : './assets/default-image.png';
    $data_publicacao = date('Y-m-d H:i:s', strtotime((string) $item->pubDate));

    // Verificando se a notícia já existe no banco
    $stmt = $pdo->prepare("SELECT * FROM noticias WHERE titulo = :titulo");
    $stmt->execute([':titulo' => $titulo]);

    if ($stmt->rowCount() == 0){
        // Inserindo no banco
        $stmt = $pdo->prepare("INSERT INTO noticias (titulo, descricao, link, imagem, data_publicacao) VALUES (?,?,?,?,?)");
        $stmt->execute([$titulo, $descricao, $link, $imagem, $data_publicacao]);
    }
}

?>