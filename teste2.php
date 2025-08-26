<?php
class MinhaClasse {
    public $propriedade1 = "valor1";
    public $propriedade2 = "valor2";
    public $propriedade3 = 2025;
}

$propriedades = get_class_vars("MinhaClasse");
var_dump($propriedades);