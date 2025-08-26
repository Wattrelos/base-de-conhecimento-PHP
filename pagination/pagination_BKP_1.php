<?php
// Parâmetros de Conexão

$host    = 'localhost';
$db      = 'comercioeletronico';
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
$stmt = $pdo->prepare(query: 'SELECT * FROM `comercioeletronico`.`product` ORDER BY product_name LIMIT :perPage OFFSET :offset');
$stmt->execute([':perPage' => $itensPerPage, ':offset' => $offset]);
$products = $stmt->fetchAll();
// var_dump($products); // Mostra se carregou dados.
// Descobrindo o Número Total de Produtos para Paginação
$totalStmt = $pdo->query('SELECT COUNT(*) FROM `comercioeletronico`.`product`');
$totalRows = $totalStmt->fetchColumn();
$totalPages = ceil($totalRows / $itensPerPage);

// Exibindo os Produtos em uma Tabela
// echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Preço</th></tr>";
// foreach ($products as $product) {
// echo "<tr><td>". $product['id'] . "</td><td>" . $product['product_name'] . "</td><td>$" . $product['price'] . "</td></tr>";
// }
// echo "</table>";

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

?>
<!----------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" href="/view/javascript/bootstrap/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="/view/image/favicon.ico">
    </head>
    <body>
               <table class="table table-responsive table-bordered table-striped">                    
                    <thead>
                        <tr> <!-- Mostra as colunas com os respectivos nomes -->
                            <?php
                            // Alterna a classificação dos dados entre ascendente e descendente                        
                            echo "<table border='1'><th>ID</th><th>Nome</th><th>Preço</th>";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        foreach ($products as $product) {
                            echo '<tr>';
                            echo "<td>". $product['id'] . "</td><td>" . $product['product_name'] . "</td><td>$" . $product['price'] . "</td>";
                            echo '</tr>';
                        }
                        
                        ?>
                    </tbody>
                </table>                       
        <script src="/view/javascript/jquery/jquery-3.3.1.slim.min.js"></script>
        <script src="/view/javascript/popper.min.js"></script>
        <script src="/view/javascript/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01"> 
          <?php
          
            if($totalPages  > 1)  { // Só mostrará os botões de paginação se houver mais de uma página no total.
              if ($page > 1) { // Verifica e só mostra se estiver na segunda página em diante.
                echo '<a class="navbar-nav ml-1" href=?page=1><button type="button" class="btn btn-outline-primary">Primeira</button></a>'; // Botão "primeira página"
                echo '<a class="navbar-nav ml-1" href=?page='.($page - 1).'><button type="button" class="btn btn-outline-primary">Anterior</button></a>'; // Botão "página anterior.
                for ($i = $page - 5; $i < $page; $i++) { // Mostra botões de escolha para até 5 páginas anteriores a página atual, se houver.
                    if ($i >1) { // Precaução para evita mostrar páginas negativas. Só mostra botões da página 2 em diante.
                      echo '<a class="navbar-nav ml-1" href="?page='.$i.'"><button type="button" class="btn btn-outline-primary">'.($i).'</button></a>';
                    }
                }
              }
              echo '<a class="navbar-nav ml-1"><button type="button" class="btn btn-secundary">'.$page.'</button></a>'; // Página atual (sem link)
              if ($page < $totalPages ) { // Verifica se a página atual é a última, se for, não mostra botões após a página atual.
                for ($i = $page + 1; ($i <= ($page + 5)) && ($i < $totalPages ); $i++) { // Mostra até botões depois da página atual, desde que a página atual não seja a última.
                  echo '<a class="navbar-nav ml-1" href="?page='.$i.'"><button type="button" class="btn btn-outline-primary">'.($i).'</button></a>';
                }
                echo '<a class="navbar-nav ml-1" href="?page='.($page + 1).'"><button type="button" class="btn btn-outline-primary">Próxima</button></a>'; // Botão "próxima página"
                echo '<a class="navbar-nav ml-1" href="?page='.($totalPages ).'"><button type="button" class="btn btn-outline-primary">Última</button></a>'; // Botão "última página"         
              }
              // O formulário, à seguir, é para buscar por página digitada pelo usuário. Aqui foi utilizado o método POST, mas pode-se utilizar variáveis na sessão.
              echo '<form class="form-inline ml-1 my-lg-0" action="">';
              echo '<input type="hidden" name="className" value="$className">'; // Mantêm a busca na classe atual, por exemplo, se a classe for "produto", busca em produto.
              echo '<input class="form-control mr-sm-2" type="number" placeholder="Ir para a página" name="page" min="1" max="'.$totalPages .'" required >'; // Só aceita valores entre 1 e o número de páginas
              // echo '<button class="btn btn-outline-success my-2 my-sm-0" type="submit">OK</button>';
              echo '</form>';
            } 
            if ($searchByWord) {
              echo '<a class="navbar-nav ml-1" href="&searchByWord=clear"><button type="button" class="btn btn-outline-primary">$searchByWord &#10060</button></a>';
            }  
                   
            ?>            
    </div>
  </nav>