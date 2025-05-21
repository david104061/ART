<!-- Pour la récupération de mot de passe -->

<?php 

    // Démarage de la séssion 
    session_start();

    // Connexion en base de donnée par inclusion
    require '../config/database.php';

    // Vérification que la méthode post est utilisée.
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = trim($_POST["email_2"]);

        // Recherché l'utilisateur dans la base de donnée
        $conn = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $conn->execute([$email]);
        $user = $conn->fetch(PDO::FETCH_ASSOC);

        if ($user)
        {
            // GEnération d'une token sécurisée
            $token = bin2hex(random_bytes(16));

            // Définir une expiration de la token
            $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

            // Stocker le tocken et son expiration en base de donnée
            $updateConn = $pdo->prepare("UPDATE users SET reset_token = ?, token_expiry = ? WHERE id = ?");
            $updateConn->execute([$token, $expiry, $user['id']]);

            // Lien de réinitialisation 
            $resetLink = "http://localhost/projet_2/public/partials/reset_password.php?token=" . $token; 
            // votresite.com est à changer car je n'ai pas encore de nom de domaine propre

            // Préparation des méssages à envoyer 
            $subjet = "Réinitialisation de votre mot de passe ";
            $message = "Bonjour, <br><br>Cliquez sur le lien suivant pour réinitialiser votre mot de passe : <br> " . $resetLink . "<br><br>Si vous n'avez pas démandez de réinitialisation, ignorez cet e-mail.";
            $headers = "From: no-reply@votresite.com"; /* Dois être modifier plus tard */

            // Envoyer l'e-mail (se rassurer que la fonction mail() soit configurer sur le serveur)
            if (mail($email, $subjet, $message, $headers))
            {
                $_SESSION['success'] = "Un e-mail de réinitialisation vous a été envoyé.";
            }
            else
            {
                $_SESSION['error'] = "Erreur lors de l'envoi de l'e-mail.";
            }
        }
        else
        {
            // Pour plus de sécurité, affichons un méssage même si l'e-mail n'existe pas
            $_SESSION['success'] = "Un e-mail de réinitialisation vous a été envoyé.";
        }
        header("location: ../public/index.php");
        exit();
    }
    else
    {
        echo "Méthode invalide.";
        exit();
    }

?>