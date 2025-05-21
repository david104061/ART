<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/9d673adfb6.js" crossorigin="anonymous"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Document</title>
    <link rel="stylesheet" href="./css/header.css">
</head>

<body>

    <section class="section_1" id="section_1">
        <div class="color"></div>

        <div class="head">
            <nav>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
            </nav>

            <!-- <label for="langues" id="langues"></label> -->
            <select name="langues" id="langues">
                <option value="francais" selected>Français</option>
                <option value="anglais">Anglais</option>
            </select>
        </div>
    </section>

    <header id="header">
        <div class="logo">
            <h1>LOGO</h1>
        </div>

        <div class="hamburger-menu" id="hamburger-menu">
            <i class="fa-solid fa-bars"></i>
        </div>

        <div class="entete" id="entete">
            <div class="search-container">

                <i class="fa-solid fa-filter filter-icon"></i>
                <input type="text" placeholder="Rechercher un produit ou un artisan" class="search-input">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>

            </div>

            <nav id="nav">
                <ul>
                    <li><a href="#section_1">Accueil</a></li>
                    <li><a href="#">Produits</a></li>
                    <li><a href="#">Artisans</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>

            <div class="join-container" id="join-container">
                <a href="#"><i class="fa-solid fa-cart-shopping shop-icon"></i></a>
                <button class="btn-signin" id="btn-login" aria-label="Se connecter">
                    <i class="fa-solid fa-user"></i>Connexion
                </button>

                <button class="btn-signup" id="btn-register" aria-label="S'inscrire">
                    <i class="fa-solid fa-user"></i>Inscription
                </button>

            </div>

            <div class="hamburger-menu_1" id="hamburger-menu_1">
                <i class="fa-solid fa-bars"></i>
            </div>

        </div>

    </header>

    <!-- Formulaire -->
    <div class="form-container" id="form-container">

        <div class="message">
            <p>un petit message !!</p>
        </div>

        <!-- Formulaire de connexion -->
        <form action="../controllers/login.php" id="login-form" method="post">

        <!-- Bouton retour -->
        <button id="back" class="backBack">Retour</button>

            <h2>Connexion</h2>

            <div class="input-container">
                <input type="email" name="email_1" id="email_1" required class="input">
                <label for="email_1" class="label-form">Email</label>
                <span class="error-message" id="email_1-error"></span>
            </div>

            <div class="input-container password-container">
                <input type="password" name="password_1" id="password_1" required class="input">
                <label for="password_1" class="label-form">Mot de passe</label>
                <button type="button" class="toggle-password" onclick="togglePassword('password_1')">👁</button>
                <span class="error-message" id="password_1-error"></span>
            </div>


            <div class="input-container lost-past">
                <label>
                    <input type="checkbox" name="remember" id="remember"> Se souvenir de moi
                </label>
                <p> <a href="#" class="forget-pass">Mot de passe oublié ?</a></p>
            </div>

            <button type="submit" class="main-btn">Connexion</button>
            <p class="choise-login"><span class="separator">OU</span></p>

            <a href="#" class="other-btn"><i class="fa-brands fa-google"></i>Google</a>
            <a href="#" class="other-btn"><i class="fa-brands fa-apple"></i>Apple</a>

            <p>Vous n'avez pas de compte ? <a href="#" class="lien-inscription">Inscrivez-vous</a></p>
        </form>

        <!-- Foumulaire de récupération de mot de passe -->
        <form action="../controllers/forgot_password.php" id="reset-form" method="post">

        <!-- Bouton retour -->
        <button id="back" class="backBack">Retour</button>

            <h2>mot de passe oublié</h2>

            <div class="input-container">
                <input type="email" name="email_2" id="email_2" required class="input">
                <label for="email_2" class="label-form">Email</label>
            </div>

            <button type="submit" class="main-btn">Envoyer</button>

            <p>Vous n'avez pas de compte ? <a href="#" class="lien-inscription">Inscrivez-vous</a></p>
        </form>

        <!-- Formulaire d'inscription -->
        <form method="POST" action="../controllers/registrer.php" id="signup-form">

        <!-- Bouton retour -->
        <button id="back" class="backBack">Retour</button>

            <h2>Inscription</h2>

            <!-- Champ pour le nom complet -->
            <div class="input-container">
                <input type="text" name="nom" id="nom" required class="input">
                <label for="nom" class="label-form">Nom Complet</label>
                <span class="error-message" id="nom-error"></span>
            </div>

            <!-- Champ pour l'email -->
            <div class="input-container">
                <input type="email" name="email_3" id="email_3" required class="input">
                <label for="email_3" class="label-form">Email</label>
                <span class="error-message" id="email_3-error"></span>
            </div>

            <!-- Champ pour le mot de passe -->
            <div class="input-container password-container">
                <input type="password" name="password_3" id="password_3" required class="input">
                <label for="password_3" class="label-form">Mot de passe</label>
                <button type="button" class="toggle-password" onclick="togglePassword('password_3')">👁</button>
                <span class="error-message" id="password_3-error"></span>
            </div>

            <!-- Champ pour confirmer le mot de passe -->
            <div class="input-container password-container">
                <input type="password" name="confirm-password" id="confirm-password" required class="input">
                <label for="confirm-password" class="label-form">Confirmer le mot de passe</label>
                <button type="button" class="toggle-password" onclick="togglePassword('confirm-password')">👁</button>
                <span class="error-message" id="confirm-password-error"></span>
            </div>

            <!-- Champ pour sélectionner le rôle -->
            <div class="input-group">
                <label for="role">Rôle</label>
                <select id="role" name="role" onchange="toggleVendorChamp()">
                    <option value="Acheteur">Acheteur</option>
                    <option value="Vendeur">Vendeur</option>
                </select>
            </div>

            <!-- Champs supplémentaires pour le vendeur -->
            <div id="vendor-champ" class="hidden">
                <div class="input-container">
                    <input type="text" id="shopname" name="shopname" class="input">
                    <label for="shopname" class="label-form">Nom de la Boutique</label>
                    <span class="error-message" id="shopname-error"></span>
                </div>

                <div class="input-container">
                    <input type="text" id="categories" name="categories" class="input">
                    <label for="categories" class="label-form">Catégorie de produits</label>
                    <span class="error-message" id="categories-error"></span>
                </div>
            </div>

            <!-- Acceptation des termes et conditions -->
            <div class="input-container">
                <label>
                    <input type="checkbox" name="remember_1" id="remember_1" required> J'accepte <a href="#">les termes et conditions</a>
                </label>
            </div>

            <!-- Bouton d'inscription -->
            <button type="submit" name="register_btn" class="main-btn">Inscription</button>

            <!-- Lien vers la page de connexion -->
            <p>Vous avez déjà un compte ? <a href="#" class="lien-connexion">Connectez-vous</a></p>

        </form>



    </div>
</body>

</html>