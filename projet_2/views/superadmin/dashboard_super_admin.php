<?php 

    session_start();

    if(!isset($_SESSION["roles"]) || $_SESSION["roles"] !== "Super Admin") 
    {
        die("Accès refusé");
    }

?>

<form method="POST" action="../../controllers/superadmin/create_admin.php" id="signup-form">

            <h2>Inscription</h2>

            <!-- Champ pour le nom complet -->
            <div class="input-container">
                <input type="text" name="nom" id="nom" required class="input">
                <label for="nom" class="label-form">Nom Complet</label>
                <span class="error-message" id="nom-error"></span>
            </div>

            <!-- Champ pour l'email -->
            <div class="input-container">
                <input type="email" name="email" id="email" required class="input">
                <label for="email" class="label-form">Email</label>
                <span class="error-message" id="email-error"></span>
            </div>

            <!-- Champ pour le mot de passe -->
            <div class="input-container password-container">
                <input type="password" name="password" id="password" required class="input">
                <label for="password" class="label-form">Mot de passe</label>
                <button type="button" class="toggle-password" onclick="togglePassword('password')">👁</button>
                <span class="error-message" id="password-error"></span>
            </div>

            <!-- Champ pour confirmer le mot de passe -->
            <div class="input-container password-container">
                <input type="password" name="confirm-password" id="confirm-password" required class="input">
                <label for="confirm-password" class="label-form">Confirmer le mot de passe</label>
                <button type="button" class="toggle-password" onclick="togglePassword('confirm-password')">👁</button>
                <span class="error-message" id="confirm-password-error"></span>
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit" name="register_btn">Créer un Admin</button>

            <!-- Bouton retour -->
            <button id="back">Retour</button>

        </form>