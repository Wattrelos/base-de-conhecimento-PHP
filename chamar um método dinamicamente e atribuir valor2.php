<?php
/*

Explicação:

    class MinhaClasse: Define uma classe com um método chamado meuMetodo.
    $obj = new MinhaClasse();: Cria uma instância da classe.
    $metodo = "meuMetodo";: Armazena o nome do método que se pretende chamar numa variável.
    $valor = 10;: Armazena o valor que será passado como parâmetro para o método.
    $resultado = call_user_func(array($obj, $metodo), $valor);: Chame o método dinamicamente:
        array($obj, $metodo): Cria um array com a instância da classe e o nome do método, indicando qual método deverá ser chamado.
        call_user_func(...): Executa a função (ou método) especificada.
        $valor: O valor que será passado como parâmetro para o método. 
    echo $resultado;: Mostra o resultado da chamada do método.

Outros exemplos:
Chamar uma função nativa.


$funcao = "strtoupper";
$texto = "Olá, mundo";

$resultado = call_user_func($funcao, $texto);

echo $resultado; // Saída: OLÁ, MUNDO
?>

Chamar um método estático.

<?php

class MinhaClasse {
    public static function meuMetodoEstatico($valor) {
        return "Valor estático: " . $valor;
    }
}

$metodo = "meuMetodoEstatico";

$resultado = call_user_func("MinhaClasse::$metodo", 10);

echo $resultado; // Saída: Valor estático: 10
?>

Em resumo, call_user_func() permite-lhe chamar métodos ou funções dinamicamente, tornando o seu código mais flexível e adaptável a diferentes situações.