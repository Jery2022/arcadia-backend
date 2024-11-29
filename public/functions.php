<?php

require_once './src/config/config.php';

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
            'link' => 'UsersController.php',
        ],
        'animals' => [
            'icon' => 'list',
            'title' => 'Animaux',
            'link' => 'AnimalsController.php',
        ],
        'habitats' => [
            'icon' => 'file-earmark',
            'title' => 'Habitats',
            'link' => 'HabitatsController.php',
        ],
        'services' => [
            'icon' => 'puzzle',
            'title' => 'Services',
            'link' => 'ServicesController.php',
        ],
        'food' => [
            'icon' => 'file-earmark-text',
            'title' => 'Alimentation',
            'link' => 'FoodController.php',
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


// Fonction qui me permet de me connecter à la base de données
 
function getConnection() {

    $servername = DB_SERVER;
    $username = DB_USERNAME;
    $password = DB_PWD;
    $dbname = DB_NAME;

    try {
        // Créer la connexion PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Définir le mode d'erreur PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        writeLog( "Connexion réussie !");
    } catch(PDOException $e) {
        writeLog( "Erreur de connexion : " . $e->getMessage());
    }

    return $conn;
}

/**  Fonction qui me permet de récupérer le contenu d'une table de données 
  *  en passant en paramètres la chaîne de connexion et le nom de la table. 
**/

function getTableContent($pdo, string $tableName) : array {
    if (!$tableName) {
         $tableName=DEFAULT_TABLE;
    }

    $sql = "SELECT * FROM " . $tableName;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction qui me permet d'ajouter une activité dans un fichier de log
function writeLog(string $message) {
    $logFile = 'app.log';
    $timestamp = date("Y-m-d H:i:s");
    $logMessage = "[$timestamp] $message" . PHP_EOL;
    
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

/* Utilisation possible de la fonction
writeLog("L'utilisateur a accédé à la page d'accueil.");
writeLog("Une erreur s'est produite lors de la connexion.");
*/

function homeContent( string $tableName ) : string {
    $content = '<h3 class="text-center mb-3">Bienvenue sur l\'espace d\'administration du site du Zoo Arcadia</h3>';
    $content .= '<p class="text-center">Vous pouvez gérer les utilisateurs, les animaux, les habitats, les services et l\'alimentation des animaux.</p>';
    $content .= ' 
        <div class="table-responsive small">
            <h3 class="mt-5" id="titreItem">Liste des ' . $tableName . ' existants</h3>
            <table class="table table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nom </th>
                <th>Description</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>';
            // Appel de la fonction getTableContent
            $services = getTableContent(getConnection(), $tableName);
            foreach($services as $key =>$value) { 
                $content .= '<tr>
                <td>' . $value['service_id'] . '</td>
                <td>' . $value['nom'] . '</td>
                <td>' . $value['description_serv'] . '</td>
                <td>
                    <form action="" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="1">
                    <button type="submit" name="add" class="btn btn-primary">Ajouter</button>
                    </form>
                    <form action="" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="1">
                    <button type="submit" name="read" class="btn btn-secondary">Détails</button>
                    </form>
                    <form action="" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="1">
                    <button type="submit" name="update" class="btn btn-warning">Modifier</button>
                    </form>
                    <form action="" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="1">
                    <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
                </tr>';
            }
            $content .= '</tbody>
            </table>
        </div>
        </main>
    </div>
    </div>';
    return $content;
}