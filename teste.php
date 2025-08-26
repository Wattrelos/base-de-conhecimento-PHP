<?php
// Classes de domínio
// Classe abstrata
abstract class Entity {
    public abstract function create();
}

// Classe concreta que estende a classe abstrata
class Product extends Entity {
    public function create() {
        echo "Produto!\n";
    }
}

// Classe concreta que estende a classe abstrata
class User extends Entity {
    public function create() {
        echo "Usuario!\n"; 
    }
}

// Classes de persistência

abstract class DataAccessObject {

    protected function __construct() {}
    abstract public function create(Entity $entity);
}

class UserDAO extends DataAccessObject
{
    public function __construct() {
        parent::__construct();
    }
    public function create(Entity $entity) {
        echo "UserDAO Create "; 
        $entity->create();
    }
}
class ProductDAO extends DataAccessObject
{
    public function __construct() {
        parent::__construct();
    }

    public function create(Entity $entity) {        

        $entity->create();
        echo "ProductDAO Create "; 
        
    }
}
class DefaultDAO extends DataAccessObject
{
    public function __construct() {
        parent::__construct();
    }
    public function create(Entity $entity) {
        $entity->create();
    }
}

abstract class SimpleFactoryDAO {

	public static function returnDAO($type) {

		$choiceDAO = array(
			'product'  => new ProductDAO(), 
		    'user'     => new UserDAO()
		);		
		
		return isset($choiceDAO[get_class($type)]) ? $choiceDAO[get_class($type)] : new DefaultDAO(); // Caso nenhuma opção selecionada não seja encontrada, retorna uma classe padrão.
			
	}
}

// Criar e chamar a função com a classe concreta
$entity = new User();

// Retorna a classe DAO correspondente ao objeto.
$persist = SimpleFactoryDAO ::returnDAO($entity);
$persist->create($entity);
$entity = new Product();
$persist = SimpleFactoryDAO ::returnDAO($entity);
$persist->create($entity);