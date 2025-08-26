

<?php
    // Obter dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validar dados (exemplo)
    $erros = [];
    if (empty($nome)) {
        $erros[] = "O nome é obrigatório.";
    }
    if (empty($email)) {
        $erros[] = "O email é obrigatório.";
    }

    if (count($erros) > 0) {
        // Retornar erros (em JSON)
        $response = [
            "mensagem" => "Erro: " . implode("<br>", $erros)
        ];
        header('Content-type: application/json');
        echo json_encode($response);
        exit;
    }

    // Dados válidos - retornar mensagem de sucesso (em JSON)
    $response = [
        "mensagem" => "Dados enviados com sucesso!"
    ];
    header('Content-type: application/json');
    echo json_encode($response);

?>