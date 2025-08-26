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


// Obtém as categorias principais (onde parent_id é NULL)
$sql = "SELECT id, category_name FROM comercioeletronico.category WHERE id_subcategory = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();



function getSubcategorias($parentId, $con) {
    $categorias = array();

    // Consulta as subcategorias da categoria pai
    $sql = "SELECT id, category_name FROM comercioeletronico.category WHERE id_subcategory = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $parentId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Loop para adicionar as subcategorias ao array
    while ($row = $result->fetch_assoc()) {
        $subcategoria = array(
            "id" => $row["id"],
            "name" => $row["category_name"]
        );

        // Chama a função recursivamente para buscar subcategorias das subcategorias
        $subcategoria["children"] = getSubcategorias($row["id"], $con);

        // Adiciona a subcategoria ao array principal
        $categorias[] = $subcategoria;
    }

    return $categorias;
}

// Loop para exibir as categorias principais e suas subcategorias
while ($row = $result->fetch_assoc()) {
    echo "<h2>" . $row["category_name"] . "</h2>"; // Exibe o nome da categoria principal

    // Chama a função recursiva para obter e exibir as subcategorias
    $subcategorias = getSubcategorias($row["id"], $conn);

    if (count($subcategorias) > 0) {
        echo "<ul>";
        foreach ($subcategorias as $subcategoria) {
            echo "<li>" . $subcategoria["name"]; // Exibe o nome da subcategoria
            if (count($subcategoria["children"]) > 0) {
                echo "<ul>"; // Abre uma lista para as subcategorias
                foreach ($subcategoria["children"] as $child) {
                    echo "<li>Id=" . $child["id"] . " - ".$child["category_name"] . "</li>"; // Exibe o nome da sub-subcategoria
                }
                echo "</ul>"; // Fecha a lista das subcategorias
            }
            echo "</li>";
        }
        echo "</ul>"; // Fecha a lista das categorias principais
    }
}

$conn->close();