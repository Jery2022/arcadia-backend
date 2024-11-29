<?php
$servername = "localhost";
$username = "jose";
$password = "Keva2024@";
$dbname = "ejyr_zoo_arcadia";

try {
    // Créer la connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie ici !";
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

