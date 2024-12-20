CREATE TABLE noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    link VARCHAR(255) NOT NULL,
    data_publicacao DATETIME NOT NULL
);
