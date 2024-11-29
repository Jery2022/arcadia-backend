<?php

// Je crée une fonction qui me filtre les données d'entrée pour m'éviter l'insertion de script
function filter_input_data(string $data): string {
    return htmlspecialchars(trim($data));
}

// Function qui me permet de récupérer le menu de la sidebar
function getMenuSidebar(): array {
    $menu = [
        
        'users' => [
            'icon' => 'people',
            'title' => 'Utilisateurs',
            'link' => '#'
        ],
        'animals' => [
            'icon' => 'list',
            'title' => 'Animaux',
            'link' => '#'
        ],
        'habitats' => [
            'icon' => 'file-earmark',
            'title' => 'Habitats',
            'link' => '#'
        ],
        'services' => [
            'icon' => 'puzzle',
            'title' => 'Services',
            'link' => '#'
        ],
        'food' => [
            'icon' => 'file-earmark-text',
            'title' => 'Alimentation',
            'link' => '#'
        ]
    ];
    return $menu; 
}

function getMenuSidebarVeto(): array {
    $menu = [
        'food' => [
            'icon' => 'file-earmark-text',
            'title' => 'Aliments',
            'link' => '#'
        ],
        'menus' => [
            'icon' => 'file-earmark-text',
            'title' => 'Menus',
            'link' => '#'
        ],
        'observations' => [
            'icon' => 'file-earmark-text',
            'title' => 'Observations',
            'link' => '#'
        ]
    ];
    return $menu; 
}

// Function qui me permet de récupérer le contenu d'une tables donnée en paramètre
function getTableContent(string $table): array {
    require_once './src/config/config.php';

    $sql = $conn->prepare("SELECT * FROM :table");
    $sql->bindParam(':table', $table);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);

    var_dump('Coucou !');
}
