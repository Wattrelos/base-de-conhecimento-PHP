<?php
//2. Chamar dinamicamente um método:
class Exemplo {
    public function metodo( $valor ) {
        return 'Chamei o método com ' . $valor;
    }
}

$objeto = new Exemplo();
$metodo = 'metodo'; // Variável com o nome do método
$parametro = 'Valor do parâmetro';

// Chama o método dinamicamente
$resultado = $objeto->{$metodo}( $parametro );

echo $resultado; // Imprime "Chamei o método com Valor do parâmetro"
?>
