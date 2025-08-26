<?php

/*
Em PHP, passar uma classe como parâmetro envolve passar uma instância (objeto) da classe como argumento para uma função ou método. Para isso, é necessário definir o parâmetro da função com o tipo de classe, e na chamada da função, passar uma instância da classe.
Passagem de uma classe como parâmetro em PHP:

    Definir o parâmetro na função:
*/
class MinhaClasse {
    public function __construct(private string $nome) {
    }
    public function metodo() {
        echo "Nome: " . $this->nome;
    }
}
function processarClasse(MinhaClasse $classe) {
    $classe->metodo(); // Chama o método da classe passada
}

// Criar uma instância da classe e passar como parâmetro:
$minhaInstancia = new MinhaClasse("Exemplo");
processarClasse($minhaInstancia);