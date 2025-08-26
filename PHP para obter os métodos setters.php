<?php
/*

Em PHP, para obter os métodos setters (os métodos que definem/alteram os valores de atributos privados de uma classe),
 pode-se usar a função get_class_methods(), que retorna uma lista de métodos de uma classe. No entanto, é mais comum que se deseje obter todos os métodos que começam com "set", pois estes são os setters padrão. Para isso, pode-se percorrer a lista de métodos e filtrá-los.
Exemplo:
*/

class MinhaClasse {
    private $atributo1;
    private $atributo2;

    public function setAtributo1($valor) {
        $this->atributo1 = $valor;
    }

    public function setAtributo2($valor) {
        $this->atributo2 = $valor;
    }

    public function getAtributo1() {
        return $this->atributo1;
    }

    public function getAtributo2() {
        return $this->atributo2;
    }
}

$minhaClasse = new MinhaClasse();
$metodos = get_class_methods(MinhaClasse::class);

echo "Todos os métodos da classe:\n";
print_r($metodos);

echo "\n\nSomente os setters (métodos que começam com 'set'):\n";

$setters = [];
foreach ($metodos as $metodo) {
    if (substr($metodo, 0, 3) == 'set') {
        $setters[] = $metodo;
    }
}

print_r($setters);
/*

Neste exemplo, get_class_methods(MinhaClasse::class) retorna uma lista de todos os métodos da classe MinhaClasse. Em seguida, o código persegue essa lista e, para cada método, verifica se começa com "set". Se começar, o método é adicionado à lista de setters.
Outras considerações:

    Nomeação:
    A convenção de nomeação de setters é geralmente set{Atributo} (onde {Atributo} é o nome do atributo, com a primeira letra em maiúsculas), como setAtributo1 e setAtributo2.
    Encapsulamento:
    O uso de setters permite controlar a forma como os atributos privados de uma classe são modificados, permitindo validações ou outras operações antes de definir o valor do atributo.
    Getters:
    É comum associar setters com getters (métodos que retornam o valor de um atributo). Se um atributo é privado, um getter e um setter são necessários para acesso externo.

*/
?>

