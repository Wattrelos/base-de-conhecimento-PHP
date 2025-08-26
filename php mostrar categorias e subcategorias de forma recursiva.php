<?php
// Conexão com o banco de dados, Singleton:
class Connection {
    private static $host    = 'localhost';
    private static $sgbd    = 'mysql';// mysql, pgsql, sqlite
    private static $db      = 'ComercioEletronico';
    private static $charset = 'utf8mb4'; // utf8mb4, utf8
    private static $port    = '3306';// 3306, 5432
    private static $dsn     = '';
    private static $user    = 'root';
    private static $pass    = 'dA#Q$N#L6lSJAe';
    protected static $pdo;

    private function __construct() {
        try {
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::NULL_EMPTY_STRING,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //make the default fetch be an associative array
            ];
				    self::$dsn = self::$sgbd.':host='.self::$host.';dbname='.self::$db.';port='.self::$port.';charset='.self::$charset;
            self::$pdo = new PDO(self::$dsn, self::$user, self::$pass, $options);
        } catch (\PDOException $e) {
            echo "MySQL Connection Error: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$pdo) {
            new Connection();
        }
        return self::$pdo;
    }
}

function getCategorias() {    
    $connectionDB = Connection::getInstance();
    $stmt = $connectionDB->prepare("SELECT id, category_name, id_subcategory FROM category ORDER BY id_subcategory, id");
    $stmt->execute();
    $categorias = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categorias[$row['id']] = $row;
    }
    return $categorias;
}

// Obtém as categorias e armazena em um array
    $categorias = getCategorias();

    // var_dump($categorias);

// Crie a função recursiva:

function exibirCategoriasRecursivamente($categorias, $parent_id = 1, $indent = 1) {
    foreach ($categorias as $id => $categoria) {
        if ($categoria['id_subcategory'] == $parent_id) {
            // Exibe a categoria com o nível de indentação correto
            echo str_repeat("&nbsp;&nbsp;", $indent); // Utilize &nbsp; para espaços em branco
            echo $categoria['category_name'] . "<br>";

            // Chama a função recursivamente para exibir as subcategorias
            exibirCategoriasRecursivamente($categorias, $id, $indent + 1);
        }
    }
}

    // Chame a função:
    exibirCategoriasRecursivamente($categorias);

