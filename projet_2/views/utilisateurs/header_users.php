<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/9d673adfb6.js" crossorigin="anonymous"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/header.css">
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
                    <li><a href="../pages/produits.php">Produits</a></li>
                    <li><a href="#">Artisans</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>

            <div class="join-container" id="join-container">
                <a href="#"><i class="fa-solid fa-cart-shopping shop-icon"></i></a>
                <button class="my-accound" id="my-accound" aria-label="Mon compte">
                    <i class="fa-solid fa-user"></i>Mon compte
                </button>

                <button class="disconnect" id="disconnect" aria-label="Se déconnecter">
                    <a href="../../logout.php" style="text-decoration: none; color: inherit;">Se Déconnecter</a>
                </button>

            </div>

            <div class="hamburger-menu_1" id="hamburger-menu_1">
                <i class="fa-solid fa-bars"></i>
            </div>

        </div>

    </header>

    <script></script>
</body>

</html>