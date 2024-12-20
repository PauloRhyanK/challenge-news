# Challenge News

## Descrição do Projeto

Este projeto é uma aplicação web desenvolvida em PHP que coleta notícias de um feed RSS, armazena essas notícias em um banco de dados, e permite ao usuário listar, pesquisar e visualizar detalhes das notícias por meio de uma interface simples e intuitiva.

---

## Funcionalidades

- **Coleta de notícias**: Importa automaticamente notícias de um feed RSS.
- **Armazenamento de notícias**: Salva as notícias em um banco de dados MySQL para fácil acesso e manipulação.
- **Listagem de notícias**: Exibe uma lista das últimas notícias coletadas.
- **Pesquisa de notícias**: Permite pesquisar notícias pelo título ou descrição.
- **Visualização detalhada**: Exibe informações completas sobre uma notícia específica.

---

## Estrutura do Projeto

A organização dos arquivos do projeto é a seguinte:

```
challenge-news-main/
├── .gitignore        # Arquivos ignorados pelo Git
├── LICENSE           # Informações sobre a licença do projeto
├── README.md         # Documentação do projeto
├── assets/           # Recursos estáticos como imagens
├── db.php            # Configuração da conexão com o banco de dados
├── fetch_news.php    # Script para coletar e salvar notícias
├── index.php         # Página principal para listar e pesquisar notícias
├── noticia.php       # Página para visualizar detalhes de uma notícia
├── script.js         # Arquivo JavaScript para interatividade
└── styles.css        # Estilização do projeto
```

---

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação para desenvolver a aplicação.
- **MySQL**: Banco de dados para armazenar as notícias.
- **HTML/CSS**: Criação da interface do usuário.
- **Bootstrap**: Framework CSS para estilização rápida e responsiva.
- **JavaScript**: Interatividade básica na interface (opcional).

---

## Configuração do Ambiente

### Requisitos

- PHP 7.4 ou superior
- Servidor Apache (recomendado XAMPP ou WAMP)
- Banco de Dados MySQL

### Passos para Configuração

1. Clone este repositório para sua máquina local:

   ```bash
   git clone https://github.com/seu-usuario/challenge-news.git
   ```

2. Configure o banco de dados:

   - Crie um banco de dados chamado `noticias_db`.
   - Importe o script SQL fornecido (se houver) para criar a tabela `noticias`.

3. Atualize as credenciais no arquivo `db.php` para se conectar ao banco de dados:

   ```php
   <?php
   $host = "localhost";
   $dbname = "noticias_db";
   $username = "seu_usuario";
   $password = "sua_senha";
   ?>
   ```

4. Inicie o servidor local e acesse o projeto no navegador:
   ```
   http://localhost/challenge-news-main
   ```

---

## Uso da Aplicação

1. Acesse `fetch_news.php` no navegador para coletar e salvar as notícias do feed RSS.
2. Navegue até `index.php` para listar e pesquisar as notícias armazenadas.
3. Clique em qualquer título para visualizar os detalhes da notícia na página `noticia.php`.

---

## Melhorias Futuras

- Implementar paginação para a lista de notícias.
- Adicionar suporte a múltiplos feeds RSS.
- Adicionar autenticação para gerenciar feeds e notícias.

---

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
