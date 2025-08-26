
<?php
/*
Em PHP, é possível chamar um método de uma classe através de uma string utilizando a função call_user_func() ou a função call_user_func_array(). A primeira recebe a lista de parâmetros de forma literal, enquanto a segunda os recebe em um array.
Exemplo usando call_user_func():
*/

class MinhaClasse {
    public function metodoUm($param1, $param2) {
        return "Chamado metodoUm com $param1 e $param2";
    }

    public function metodoDois() {
        return "Chamado metodoDois";
    }
}

$classe = new MinhaClasse();
$nomeDoMetodo = "metodoUm";

// Chamar metodoUm usando call_user_func()
$resultado = call_user_func(array($classe, $nomeDoMetodo), "valor1", "valor2");
echo $resultado . "\n";

// Ou, para um método sem parâmetros
$nomeDoMetodo = "metodoDois";
$resultado = call_user_func(array($classe, $nomeDoMetodo));
echo $resultado . "\n";

/*
Exemplo usando call_user_func_array():
<?php
class MinhaClasse {
    public function metodoUm($param1, $param2) {
        return "Chamado metodoUm com $param1 e $param2";
    }

    public function metodoDois() {
        return "Chamado metodoDois";
    }
}

$classe = new MinhaClasse();
$nomeDoMetodo = "metodoUm";
$parametros = array("valor1", "valor2");

// Chamar metodoUm usando call_user_func_array()
$resultado = call_user_func_array(array($classe, $nomeDoMetodo), $parametros);
echo $resultado . "\n";

// Ou, para um método sem parâmetros
$nomeDoMetodo = "metodoDois";
$parametros = array();
$resultado = call_user_func_array(array($classe, $nomeDoMetodo), $parametros);
echo $resultado . "\n";
/*
Explicação:

    1. call_user_func():
    Aceita a instância da classe e o nome do método como um array, seguido dos argumentos do método.
    2. call_user_func_array():
    Aceita a instância da classe e o nome do método como um array, e os argumentos do método em um outro array.

Observações:

    Esta abordagem é útil quando o nome do método é dinâmico, dependendo de uma variável ou de algum cálculo.
    É importante verificar se o método existe e se os argumentos passados são do tipo esperado para evitar erros.
    O uso de call_user_func() ou call_user_func_array() permite uma maior flexibilidade na chamada de métodos, especialmente em situações onde a chamada é dinâmica.
    */
?>

