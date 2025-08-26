<?php
use dataAccessObject\Connection;

require_once $_SERVER['DOCUMENT_ROOT'].'/dataAccessObject/Connection.php';


$pdo = Connection::getInstance();

// Nome da tabela
$tabela = "User";

// Consulta SQL
$sql_table_names = "SHOW FULL COLUMNS FROM ".$tabela;

// Executa a consulta
$stm = $pdo->prepare(query: $sql_table_names);
$stm->execute();
$result = $stm->fetchAll();
// var_dump($result);

// Define o tipo de conteúdo como JSON para o browser
// header('Content-type: application/json');
// Converte o array $data em uma string JSON
// echo json_encode($result);


if (is_array($result)) {
    foreach ($result as $key => $value) {
        // echo "Chave: " . $key . ", Valor: " . $value . "<br>";
        echo " Valor: " . $value->Comment . "<br>";
        
    }
} else {
    echo "Dados JSON inválidos ou não é um array.";
}


// Verifica se há resultados
/*
    // Loop para percorrer cada coluna            
    foreach ($result as $row){
        echo "Coluna: " . $linha["Field"] . "<br>";
        echo "Tipo: " . $linha["Type"] . "<br>";
        if (!empty($linha["Comment"])) {
            echo "Comentário: " . $linha["Comment"] . "<br>";
        } else {
            echo "Sem comentário.<br>";
        }
        echo "<br>";
    }
*/



?>