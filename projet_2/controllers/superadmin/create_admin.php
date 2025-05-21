<!-- Gestion des administrateurs par un super administrateur -->

<?php 

    session_start();

    require '../../config/database.php';

    // Vérification que seul les supers Administrateurs peuvent créer un Administrateur 
    if (!isset($_SESSION['roles']) || $_SESSION["roles"] !== "Super Admin") 
    {
        die("Accès interdit !");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nom = trim($_POST["nom"]);
        $email = trim($_POST["email"]);
        $password =$_POST["password"];
        $confirm_password = $_POST["confirm-password"];

        // Vérification si tous les champs sont remplis
        if (empty($nom) || empty($email) || empty($password) || empty($confirm_password))
        {
            die("Tous les champs sont obligatoires !");
        }

        // Vérification du format de l'e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            die("Format d'e-mail invalide !");
        }

        // Vérification de la correspondance des mots de passes
        if ($password !== $confirm_password)
        {
            die("Les mots de passe ne correspondent pas !");
        }

        // Vérification si l'email existe déjà
        $checkEmail = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $checkEmail->execute([$email]);

        if ($checkEmail->rowCount() > 0)
        {
            die("C'est e-mail est déjà utilisé");
        }

        // Hachage du mot de passe
        $hached_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertion en base de donnée
        $conn = $pdo->prepare("INSERT INTO users (nom, email, user_password, roles) VALUES (?, ?, ?, 'Admin')");
        $conn->execute([$nom, $email, $hached_password]);

        echo "Admin Ajouté avec succès !";
        header("location: ../../views/superadmin/dashboard_super_admin.php");
        exit();
    }


?>