<?php


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