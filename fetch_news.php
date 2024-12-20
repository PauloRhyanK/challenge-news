<?php
require 'db.php';

// URL do feed RSS
$url = "https://agenciabrasil.ebc.com.br/rss/ultimasnoticias/feed.xml";

// Carrega o feed RSS
$rss = simplexml_load_file($url);

// Itera sobre cada item do feed RSS
foreach ($rss->channel->item as $item) {
    $titulo = (string) $item->title;
    $descricao = (string) $item->description;
    $link = (string) $item->link;
    $imagem = isset($item->{'imagem-destaque'}) ? (string) $item->{'imagem-destaque'} : './assets/default-image.png';
    $data_publicacao = date('Y-m-d H:i:s', strtotime((string) $item->pubDate));

    // Verifica se a notícia já existe no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM noticias WHERE titulo = :titulo");
    $stmt->execute([':titulo' => $titulo]);

    // Se a notícia não existir, insere no banco de dados
    if ($stmt->rowCount() == 0) {
        $stmt = $pdo->prepare("INSERT INTO noticias (titulo, descricao, link, imagem, data_publicacao) VALUES (?,?,?,?,?)");
        $stmt->execute([$titulo, $descricao, $link, $imagem, $data_publicacao]);
    }
}
?>