<?php
/*

Em PHP, pode chamar um método dinamicamente e atribuir o seu valor a uma variável usando a sintaxe call_user_func(). Esta função permite que você execute uma função (ou método) cujo nome é armazenado numa variável, permitindo assim uma chamada dinâmica.
Exemplo:
*/



class MinhaClasse {
    public function meuMetodo($valor) {
        return "Valor do método: " . $valor;
    }
}

$obj = new MinhaClasse();
$metodo = "meuMetodo"; // Armazena o nome do método numa variável
$valor = 10;

$resultado = call_user_func(array($obj, $metodo), $valor); // Chame o método dinamicamente

echo $resultado; // Saída: Valor do método: 10


