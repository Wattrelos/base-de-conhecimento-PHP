<?php
/* Em PHP, uma classe abstrata pode ter um construtor, mas não pode ser instanciada diretamente. O construtor de uma classe abstrata é usado principalmente para inicializar propriedades e chamar o construtor da superclasse (se existir). O construtor de uma classe abstrata serve como um template para as classes concretas que a herdarem, garantindo que as propriedades necessárias sejam inicializadas em todas as subclasses. 
Explicação detalhada:

    Construtor em Classes Abstratas:
    Uma classe abstrata pode definir um construtor, que é um método especial com o nome __construct(). Esse construtor é executado quando uma classe que herda da classe abstrata é instanciada. 

Finalidade do Construtor:
O construtor em uma classe abstrata serve para inicializar as propriedades da classe e, se necessário, chamar o construtor da superclasse usando parent::__construct(). Isso garante que as propriedades necessárias sejam sempre inicializadas em todas as classes que herdarem da classe abstrata. 
Herança e Instanciação:
Embora uma classe abstrata não possa ser instanciada diretamente, ela pode ser herdada por outras classes. Quando uma subclasse é instanciada, o construtor da classe abstrata (se existir) é automaticamente chamado antes do construtor da subclasse. 
Exemplo:
*/
abstract class Animal {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    abstract public function emitirSom();
}

class Cachorro extends Animal {
    public function __construct($nome) {
        parent::__construct($nome);
    }

    public function emitirSom() {
        echo "Au au!";
    }
}

$cachorro = new Cachorro("Fido"); // O construtor de Animal é chamado antes do construtor de Cachorro
echo $cachorro->nome; // Saída: Fido
echo $cachorro->emitirSom(); //