<?php

class User {
    public function __construct(private string $nome) {
    }
    public function getNome() {
        echo "Nome: " . $this->nome;
    }
}

class Product {
    public function __construct(private string $nome) {
    }
    public function getNome() {
        echo "Nome: " . $this->nome;
    }
}


abstract class DataAccessObject {
    public $user;

    public function __construct($user) {
        $this->user = $user;
    }

    abstract public function create();
}

class UserDAO extends DataAccessObject
{
    public function __construct($user) {
        parent::__construct( $user);
    }

    public function create() {
        echo '<hr>';
        echo "Create User!";
    }
}

class ProductDAO extends DataAccessObject
{
    public function __construct($product) {
        parent::__construct( $product);
    }

    public function create() {
        echo '<hr>';
        echo "Create product!";
    }
}


function processarClasse(DataAccessObject $classe) {
    $classe->create(); // Chama o método da classe passada
}


$minhaInstancia = new UserDAO("Exemplo");
processarClasse($minhaInstancia);
$OutraInstancia = new ProductDAO("Exemplo");
processarClasse($OutraInstancia);




/*
$cachorro = new UserDAO("Fido"); // O construtor de Animal é chamado antes do construtor de Cachorro
echo $cachorro->user; // Saída: Fido
echo $cachorro->create(); //
*/