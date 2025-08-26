<?php
/*
// Fonte: https://www.mco2.com.br/artigos/como-paginar-dados-de-forma-eficiente-com-php-e-mysql.html

Introdução

A paginação de dados é uma técnica essencial para desenvolvedores web, permitindo exibir grandes quantidades de informações
em partes gerenciáveis sem sobrecarregar o usuário ou o sistema. Este artigo explora como implementar a paginação eficiente
de dados do MySQL usando PHP, demonstrando através de um código de exemplo prático e detalhado.

Código de Exemplo:

Este código PHP utiliza PDO para realizar uma paginação eficiente de dados da tabela product em um banco de dados MySQL.
A conexão é estabelecida, e a página atual é determinada a partir da entrada do usuário.

A consulta ao banco de dados é paginada, limitando os resultados a um subconjunto específico por página.
Os resultados são exibidos em uma tabela HTML, com links para navegar entre as páginas.

Explicando o Código

Nesta seção, vamos detalhar cada parte do código de exemplo para entender melhor como funciona a paginação de dados do MySQL usando PDO em PHP. O processo inclui conectar ao banco de dados, calcular a paginação e executar a consulta paginada.
Conexão com o Banco de Dados

Para estabelecer uma conexão segura com o banco de dados MySQL, utilizamos a extensão PDO do PHP. Especificamos os detalhes de conexão,
como host, nome do banco de dados, usuário e senha, e definimos algumas opções de PDO para garantir uma execução segura e eficiente das
consultas, protegendo contra ataques de injeção SQL.
*/
// Parâmetros de Conexão
/*
$host    = 'localhost';
$db      = 'ComercioEletronico';
$user    = 'root';
$pass    = 'dA#Q$N#L6lSJAe';
$charset = 'utf8mb4';
$sgbd    = 'mysql';// mysql, pgsql, sqlite

// Opções do PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// String de Conexão
$dsn = "mysql:host=$host;dbproduto=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
*/
use dataAccessObject\Connection;
require_once $_SERVER['DOCUMENT_ROOT'].'/dataAccessObject/Connection.php';

$pdo = Connection::getInstance(); // Obtém a conexão com o banco de dados
/*
Determinação da Página Atual e Preparação da Consulta Paginada

Após estabelecer a conexão com o banco de dados, o próximo passo é calcular qual página de dados será exibida. Isso é feito verificando o
parâmetro 'page' na URL. Com base nesse valor, calculamos o deslocamento necessário para a consulta SQL. Essa abordagem permite buscar do
banco de dados apenas os registros necessários para a página atual, otimizando o desempenho e a experiência do usuário.
*/
// Determinação da Página Atual
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$itensPerPage = 25; // Produtos por página
$offset = ($page - 1) * $itensPerPage;

// Consulta Paginada com Bind Direto no Execute
$stmt = $pdo->prepare(query: 'SELECT * FROM `product` ORDER BY produto LIMIT :perPage OFFSET :offset');
$stmt->execute([':perPage' => $itensPerPage, ':offset' => $offset]);
$products = $stmt->fetchAll();
// var_dump($products); // Mostra se carregou dados.
// Descobrindo o Número Total de Produtos para Paginação
$totalStmt = $pdo->query('SELECT COUNT(*) FROM product');
$totalRows = $totalStmt->fetchColumn();
$totalPages = ceil($totalRows / $itensPerPage);

// Exibindo os Produtos em uma Tabela
echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Preço</th></tr>";
foreach ($products as $product) {
    echo "<tr><td>". $product->{'id'} . "</td><td>" . $product->{'produto'} . "</td><td>$" . $product->{'venda'} . "</td></tr>";
}
echo "</table>";

// Links de Paginação
echo "<p style='text-align: center;'>";
if ($page > 1) {
    echo '<a href="?page=' . (1) . '">Primeira Página</a>';
    echo '<a href="?page=' . ($page - 1) . '">Página Anterior</a> ';
    for ($i = $page - 5; $i < $page; $i++) {
        if ($i >1) {
            echo '<a href="?page=' . ($i) . '">.'.($i).'.</a>';
        }
    }
}
echo " <<".$page.">>";
if ($page < $totalPages) {
    for ($i = $page + 1; $i <= ($page + 5) && ($i <= $totalPages); $i++) {
        echo '<a href="?page=' . ($i) . '">.'.($i).'.</a>';
    }
    echo '<a href="?page=' . ($page + 1) . '">Próxima Página</a>';
    echo '<a href="?page=' . ($totalPages) . '">Ultima Página</a>';
}

