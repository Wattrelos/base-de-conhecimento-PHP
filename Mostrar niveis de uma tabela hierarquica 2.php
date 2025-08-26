<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$password = 'dA#Q$N#L6lSJAe';
$database = "comercioeletronico";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para obter os descendentes recursivamente
function get_descendants($conn, $parent_id, $level = 0) {
    $sql = "SELECT id, category_name, id_subcategory FROM category WHERE id_subcategory = ? ORDER BY category_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $parent_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $level++;
            echo "<p style='margin-left:" . ($level * 20) . "px;'>";
            echo "Nível: " . $level . "<br>";
            echo "ID: " . $row["id"] . ", category_name: " . $row["category_name"] . "</p>";
            get_descendants($conn, $row["id"], $level);
            $level--;
        }
    }
    $stmt->close();
}

// Início da hierarquia
$root_id = 1; // ID do nó raiz
$level = 0;

echo "<h1>Hierarquia da Tabela</h1>";
get_descendants($conn, $root_id, $level);

// Fechar conexão
$conn->close();
?>