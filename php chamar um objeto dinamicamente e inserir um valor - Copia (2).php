
<?php
//3. Combinando atribuição e chamada de método dinâmicos:
class Exemplo {
    public function setNome( $nome ) {
        $this->nome = $nome;
        return $this; // Permitir encadeamento
    }

    public function getNome() {
        return $this->nome;
    }
}

$objeto = new Exemplo();
$metodo = 'setNome'; // Variável com o nome do método
$valor = 'Dinâmico';

// Usa a variável para chamar o método e o valor dinâmico
$objeto->{$metodo}( $valor )->getNome(); // Chama setNome, depois getNome

echo $objeto->nome; // Imprime "Dinâmico"

/*

Explicação:

    Operador ->: Usado para acessar propriedades e métodos de objetos.
    Chaves {}: Em conjunto com o operador ->, permitem que o nome da propriedade ou método seja uma variável.
    call_user_func_array(): Para chamadas de métodos com parâmetros variáveis, que podem ser útil em situações complexas.

Observações:

    O uso de variáveis dinâmicas para acessar propriedades e métodos pode tornar o código mais complexo e difícil de ler. Use com moderação.
    Verifique se os nomes das propriedades e métodos existentes para evitar erros.
    Se precisar manipular nomes de objetos ou métodos de forma mais complexa, considere o uso de funções que manipulem strings e arrays para obter os nomes desejados.
    */

    ?>