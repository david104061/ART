<?php

    // Démarrage de la session
    session_start();

    // Inclusion de la connexion à la base de données
    require '../config/database.php';

    // Vérification de la méthode HTTP et si le bouton d'inscription a été cliqué
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Récupération des données du formulaire
        $nom = trim($_POST["nom"]);
        $email = trim($_POST["email_3"]);
        $user_password = $_POST["password_3"];
        $confirm_password = $_POST['confirm-password'];
        $roles = $_POST['role'];

        // Vérification que les mots de passe correspondent
        if ($user_password !== $confirm_password) 
        {
            $_SESSION['error'] = 'Les mots de passe ne correspondent pas !';
            echo "Les mots de passe ne correspondent pas !";
            exit();
        }

        // Hachage du mot de passe
        $hached_password = password_hash($user_password, PASSWORD_DEFAULT);

        // Vérification si l'email est déjà utilisé
        try {
            $conn = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $conn->execute([$email]);
            if ($conn->fetch())
            {
                $_SESSION['error'] = "Cet email est déjà utilisé !";
                echo "Cet email est déjà utilisé !";
                // header("Location: ../views/register.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur lors de la vérification de l'email : " . $e->getMessage();
            echo "Erreur lors de la vérification de l'email : ";
            // header("Location: ../views/register.php");
            exit();
        }

        // Insertion dans la base de données
        try {
            if ($roles === "Vendeur") 
            {
                $shopname = trim($_POST['shopname']);
                $categories = trim($_POST['categories']);

                // Préparation de la requête d'insertion pour un vendeur
                $conn = $pdo->prepare("INSERT INTO users (nom, email, user_password, roles, shopname, categories) VALUES (?, ?, ?, ?, ?, ?)");
                $conn->execute([$nom, $email, $hached_password, $roles, $shopname, $categories]);
            } 
            else 
            {
                // Préparation de la requête d'insertion pour un client
                $conn = $pdo->prepare("INSERT INTO users (nom, email, user_password, roles) VALUES (?, ?, ?, ?)");
                $conn->execute([$nom, $email, $hached_password, $roles]);
            }

            // Message de succès
            $_SESSION['success'] = "Inscription réussie !";
            header("Location: ../views/utilisateurs/dashboard.php");
            exit();
        } catch (PDOException $e) {
            // Message d'erreur en cas d'échec de l'insertion
            $_SESSION['error'] = "Erreur lors de l'inscription : " . $e->getMessage();
            echo "Erreur lors de l'inscription :  ";
            // header("Location: ../views/register.php");
            exit();
        }
    }
    else 
    {
        // Si la méthode n'est pas POST ou si le bouton d'inscription n'a pas été cliqué, redirection vers la page d'inscription
        echo "mauvaise méthode ";
        // header("Location: ../views/register.php");
        exit();
    }


?>