<!-- Formulaire pour entrer son nouveau mot de passe -->

<?php 

    //Début de la session
    session_start();

    // Inclusion de la connexion en base de donnée
    require '../../config/database.php';

    if (isset($_GET['token'])) 
    {
        $token = $_GET['token'];

        //Vérifier le token et son expiration
        $conn = $pdo->prepare(("SELECT id, token_expiry FROM users WHERE reset_token = ?"));
        $conn->execute([$token]);
        $user = $conn->fetch(PDO::FETCH_ASSOC);

        if ($user && strtotime($user['token_expiry']) > time()) 
        {
            // Si le token est valide, on affiche le formulaire de réinitiélisation
            ?>

            <form action="reset_password?token=<php echo htmlspecialschars($token); ?>" method="post">
                <h2>Réinitialiser le mot de passe </h2>

                <div class="input-container">
                    <input type="password" name="new_password" id="new_password" class="input" required>
                    <label for="new_password" class="label-form">Nouveau mot de passe </label>
                    <span class="error-message" id="new_password-error"></span>
                </div>

                <div class="input-container">
                    <input type="password" name="confirm_new_password" id="confirm_new_password" class="input" required>
                    <label for="confirm_new_password" class="label-form">Nouveau mot de passe </label>
                    <span class="error-message" id="confirm_new_password-error"></span>
                </div>

                <button type="submit">Réinitialiser</button>
            </form>

            <?php
        }
        else
        {
            echo "Le lien de réinitialisation est expiré.";
            exit();
        }
    }
    elseif ($_SERVER["REQUESR_METHOD"] == "POST" && isset($_GET['token']))
    {
        // Traitement du nouveau mot de passe
        $token = $_GET['token'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];

        if ($new_password !== $confirm_new_password)
        {
            echo "Les mots de passe ne correspondent pas.";
            exit();
        }

        // Hachage du nouveau mot de passe
        $hached_password = password_hash($new_password, PASSWORD_DEFAULT);

        //Mettre à jour le mot de passe et reinitialiser le token
        $updateConn = $pdo->prepare("UPDATE users SET user_password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ? ");
        if ($updateConn->execute([$hached_password, $token]))
        {
            echo"Votre mot de passe a été réinitialisé avec succès.";
            
            // Direction vers la page de connexion 
        }
        else{
            echo "Erreur lors de la mise à jour du mot de passe.";
        }
    }
    else{
        echo "Aucun token n'a été fourni.";
        exit();
    }

?>