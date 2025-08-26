<?php

abstract class AbstractEntity {
    protected string $nome = "Classe Entidade Abstrata";
    public function __construct() {
    }
    public function getNome() {
        echo "Nome: " . $this->nome;
    }
}
class User {
    protected string $nome = "Classe User";
    public function __construct() {
    }
    public function getNome() {
        echo "Nome: " . $this->nome;
    }
}

class Product {

    protected string $nome = "Classe Product";
    public function __construct() {
    }
    public function getNome() {
        echo "Nome: " . $this->nome;
    }
}


abstract class DataAccessObject {
    public AbstractEntity $entity;

    public function __construct() {
        // $this->user = $entity;
    }

    abstract public function create();
}

class UserDAO extends DataAccessObject
{
    public function __construct() {
        parent::__construct( );
    }

    public function create() {
        echo '<hr>';
        echo "Create User";
    }
}

class ProductDAO extends DataAccessObject
{
    public function __construct() {
        parent::__construct();
    }

    public function create() {        
        echo '<hr>';
        echo "Create product : ";
        // echo $entity->getNome();
    }
}


function processarClasse(DataAccessObject $classe) {
    $classe->create(); // Chama o método da classe passada
}


$entity = new Product();
$minhaInstancia = new UserDAO();
processarClasse($minhaInstancia);

$entity2 = new User();
$OutraInstancia = new ProductDAO();
processarClasse($OutraInstancia);




/*
$cachorro = new UserDAO("Fido"); // O construtor de Animal é chamado antes do construtor de Cachorro
echo $cachorro->user; // Saída: Fido
echo $cachorro->create(); //
*/