<?php 

session_start();
require '../config/database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email_1"]);
    $user_password = $_POST["password_1"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email invalide !";
        exit;
    }

    $conn = $pdo->prepare("SELECT id, nom, user_password, roles FROM users WHERE email = ?");
    $conn->execute([$email]);
    $user = $conn->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($user_password, $user["user_password"])) {
        session_regenerate_id(true); // Sécurise l'ID de session

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["nom"];
        $_SESSION["roles"] = $user["roles"];

        // Redirection en fonction du rôle
        if ($user["roles"] === "Super Admin") {
            header("Location: ../views/superadmin/dashboard_super_admin.php");
            exit;
        } elseif ($user["roles"] === "Admin") {
            header("Location: ../views/admin/dashboard_admin.php");
            exit;
        } else {
            header("Location: ../views/utilisateurs/dashboard.php");
            exit;
        }
    } else {
        echo "Email ou mot de passe incorrect ! <a href='../views/login.php'>Réessayer</a>";
    }
}
?>
