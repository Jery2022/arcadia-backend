<?php
session_start();
require_once '../src/config/config.php';
require_once './functions.php';


  // Je récupère les données du formulaire de connexion et je les filtre
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = filter_input_data($_POST['username']);
  $password = filter_input_data($_POST['password']);
}

// Hachage du mot de passe
$passwordFormHach = password_hash($password, PASSWORD_BCRYPT);

$sql = $conn->prepare("SELECT * FROM utilisateur WHERE username=:username");
$stmt->bindParam(':username', $username);
$stmt->execute();



  if ($stmt && $stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($passwordFormHach, $user['password'])) {
      $_SESSION['username_id'] = $user['id'];
      $_SESSION['nom'] = $user['nom'];
      $_SESSION['prenom'] = $user['prenom'];
      $_SESSION['role_id'] = $user['role_id'];

      header("Location: index.php");
      exit();
    } else {
      echo "Mot de passe incorrect.";
    }
  } else {
    echo "Utilisateur non trouvé.";
  }
?>
