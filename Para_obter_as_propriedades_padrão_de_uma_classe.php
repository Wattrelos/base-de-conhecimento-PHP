<?php
/*
get_class_vars($nome_da_classe): Esta função retorna um array associativo com as propriedades padrão de uma classe, juntamente com os seus valore
*/
class MinhaClasse {
    public $propriedade1 = "valor1";
    public $propriedade2 = "valor2";
}

$propriedades = get_class_vars("MinhaClasse");
var_dump($propriedades);

/*

Para obter os métodos de uma classe:

    get_class_methods($nome_da_classe): Esta função retorna um array com os nomes dos métodos definidos numa classe. 
*/
class MinhaClasse2 {
    public function metodo1() {
        echo "Este é o método 1\n";
    }

    public function metodo2() {
        echo "Este é o método 2\n";
    }
}

$metodos = get_class_methods("MinhaClasse2");
var_dump($metodos);