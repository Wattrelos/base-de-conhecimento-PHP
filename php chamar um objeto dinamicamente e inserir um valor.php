<?php
/*

Em PHP, pode-se chamar um objeto dinamicamente e inserir um valor usando variáveis que armazenam nomes de propriedades ou métodos e, em seguida, utilizando-as para acessar ou modificar o objeto. Isso permite criar código flexível e adaptável.
Exemplos:
1. Atribuir dinamicamente a um valor de propriedade:*/
class Exemplo {
    public int $nome = 1;
}

$objeto = new Exemplo();
$propriedade = 'nome'; // Variável com o nome da propriedade
$novoValor = 10;

// Atribui o valor dinamicamente usando a variável $propriedade
$objeto->{$propriedade} = $novoValor;
echo $propriedade.' == ';
echo $objeto->nome; // Imprime "Novo Valor"


/*
class Exemplo {
    public $nome = 'Valor Inicial';
}

$objeto = new Exemplo();
$propriedade = 'nome'; // Variável com o nome da propriedade
$novoValor = 'Novo Valor';

// Atribui o valor dinamicamente usando a variável $propriedade
$objeto->{$propriedade} = $novoValor;

echo $objeto->nome; // Imprime "Novo Valor"
*/
?>

