<?php
/*

Em PHP, você pode passar uma classe abstrata por parâmetro de função, mas você precisa usar a classe concreta que herda da classe abstrata ao invés da própria classe abstrata. As classes abstratas não podem ser instanciadas diretamente.
Como funciona:

    1. Defina a classe abstrata:
    Uma classe abstrata é definida com a palavra-chave abstract e pode conter métodos abstratos (definidos com a palavra-chave abstract, sem corpo).
    2. Implemente a classe abstrata:
    Você precisa criar uma classe concreta que estenda a classe abstrata e implemente todos os métodos abstratos.
    3. Use a classe concreta por parâmetro:
    Ao invés de passar a classe abstrata como parâmetro, você passa uma instância da classe concreta que implementa a classe abstrata.
    4. A função pode trabalhar com a classe abstrata:
    A função pode então usar métodos da classe abstrata, pois as classes concretas que a implementam terão esses métodos definidos.

Exemplo:
*/

// Classe abstrata
abstract class Animais {
    abstract public function fazerBarulho();
}

// Classe concreta que estende a classe abstrata
class Cachorro extends Animais {
    public function fazerBarulho() {
        echo "Au au!\n";
    }
}

// Classe concreta que estende a classe abstrata
class Gato extends Animais {
    public function fazerBarulho() {
        echo "Miau!\n"; 
    }
}

// Função que recebe um objeto de um animal
function fazerBarulhoDoAnimal(Animais $animal) {
    $animal->fazerBarulho();
}

// Criar e chamar a função com a classe concreta
$cachorro = new Cachorro();
fazerBarulhoDoAnimal($cachorro);  // Imprime "Au au!"

$gato = new Gato();
fazerBarulhoDoAnimal($gato);     // Imprime "Miau!"