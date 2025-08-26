<?php

// Array que representa as categorias e subcategorias
$categorias = [
    1 => [
        'id' => 1,
        'nome' => 'Categoria 1',
        'subcategorias' => [
            1 => [
                'id' => 2,
                'nome' => 'Subcategoria 1.1',
            ],
            2 => [
                'id' => 2,
                'nome' => 'Subcategoria 1.2',
            ],
            3 => [
                'id' => 3,
                'nome' => 'Subcategoria 1.3',
                'subcategorias' => [
                    1 => [
                        'id' => 4,
                        'nome' => 'Subcategoria 1.3.1',
                    ],
                    2 => [
                        'id' => 4,
                        'nome' => 'Subcategoria 1.3.2',
                    ],
                    3 => [
                        'id' => 4,
                        'nome' => 'Subcategoria 1.3.3',
                    ],
                    4 => [
                        'id' => 4,
                        'nome' => 'Subcategoria 1.3.4',
                    ],
                ],
            ],
            4 => [
                'id' => 3,
                'nome' => 'Subcategoria 1.3',
            ]
        ],
    ],
    2 => [
        'id' => 5,
        'nome' => 'Categoria 2',
    ],
    3 => [
        'id' => 1,
        'nome' => 'Categoria 3',
    ]
];

// Função recursiva para exibir as categorias e subcategorias
function exibirCategorias($categorias) {
    echo '<ul>';
    foreach ($categorias as $categoria) {
        echo '<li>' . $categoria['nome'] . '</li>'; // Exibe a categoria
        if (isset($categoria['subcategorias']) && count($categoria['subcategorias']) > 0) {
            echo '<ul>';
            // Se houver subcategorias, chama a função recursivamente
            echo '<ul>'; // Inicia a lista para as subcategorias
            exibirCategorias($categoria['subcategorias']); // Chama a função recursiva
            echo '</ul>'; // Fecha a lista para as subcategorias
        }
    }
    echo '</ul>';
}

// Chama a função para iniciar a exibição
exibirCategorias($categorias);
?>