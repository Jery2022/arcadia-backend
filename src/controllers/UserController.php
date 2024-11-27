<?php
include_once '../config/database.php';
include_once '../models/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->nom = $_POST['nom'];
$user->prenom = $_POST['prenom'];
$user->username = $_POST['username'];
$user->role_id = $_POST['role_id'];
$user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);


if($user->create()) {
    echo "Utilisateur créé avec succès.";
} else {
    echo "Erreur lors de la création de l'utilisateur.";
}
?>
