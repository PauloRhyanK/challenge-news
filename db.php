<?php
    // Configurações do banco de dados
    $host = "localhost";
    $dbname = "noticias_db";
    $username = "root";
    $password = "";

    try {
        // Conexão com o banco de dados usando PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem de erro
        die("ERROR: Could not connect. ". $e->getMessage());
    }
?>