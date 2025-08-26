<?php
/*Em PHP, para obter o nome não qualificado (sem o namespace) de uma classe, você pode usar a função basename() combinada com get_class() ou get_called_class(). A função get_class() retorna o nome completo da classe, enquanto basename() extrai apenas o nome da classe do caminho completo.
*/


namespace MeuEspaco\MinhaClasse;

class MinhaClasse {
  public function __construct() {
    // Dentro da classe, o get_called_class() também funciona
    $nomeDaClasse = get_called_class();
    $nomeNaoQualificado = basename($nomeDaClasse);
    echo "Nome da classe: " . $nomeDaClasse . "\n";
    echo "<hr>";
    echo "Nome da classe (não qualificado): " . $nomeNaoQualificado . "\n";
    echo "<hr>";
  }
}

// Cria uma instância da classe
$obj = new MinhaClasse();

// Se não estiver dentro da classe, use get_class()
$nomeDaClasse = get_class($obj);
$nomeNaoQualificado = basename($nomeDaClasse);

echo "Nome da classe: " . $nomeDaClasse . "\n";
echo "<hr>";
echo "Nome da classe (não qualificado): " . $nomeNaoQualificado . "\n";
echo "<hr>";
/*

Explicação:

    1. get_class() ou get_called_class():
    Estas funções retornam o nome completo da classe, incluindo o namespace, se houver. get_class() é usada quando você tem um objeto e quer saber a classe a que ele pertence. get_called_class() é usada dentro de uma classe para obter o nome da classe em questão.
    2. basename():
    Esta função extrai o nome do arquivo (ou, no nosso caso, da classe) de um caminho. Se o caminho for um nome de classe qualificado (com namespace), basename() irá retornar apenas o nome da classe.

Outras opções:

    str_replace():
    Você pode usar str_replace() para remover o namespace, mas é menos eficiente e pode não funcionar corretamente em todos os casos.
    explode():
    Você pode usar explode('\\', $nomeDaClasse) para separar o nome da classe e do namespace e obter o último elemento do array.

No entanto, basename() é geralmente a opção mais simples e recomendada para obter o nome não qualificado da classe.
A IA generativa é experimental.
*/
?>