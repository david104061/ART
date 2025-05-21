<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="../../public/css/produits.css">
    <link rel="stylesheet" href="../../public/css/header.css">
</head>

<body>

    <!-- inclusion du header -->
    <?php include_once '../utilisateurs/header_users.php'; ?>

    <main>
    <div class="carousel-container">
    <button id="prevBtn" class="button">❮</button>
    <div class="carousel">
        <div class="slide active">
            <img src="../../public/images/slider_img1.jpg" alt="Image 1">
            <div class="overlay">
                <h2>Titre 1</h2>
                <p>Description de l’image 1.</p>
                <a href="#" class="cta-button">En savoir plus</a>
            </div>
        </div>
        <div class="slide">
            <img src="../../public/images/slider_img2.jpg" alt="Image 2">
            <div class="overlay">
                <h2>Titre 2</h2>
                <p>Description de l’image 2.</p>
                <a href="#" class="cta-button">En savoir plus</a>
            </div>
        </div>
        <div class="slide">
            <img src="../../public/images/slider_img3.jpg" alt="Image 3">
            <div class="overlay">
                <h2>Titre 3</h2>
                <p>Description de l’image 3.</p>
                <a href="#" class="cta-button">En savoir plus</a>
            </div>
        </div>
        <div class="slide">
            <img src="../../public/images/slider_img1.jpg" alt="Image 4">
            <div class="overlay">
                <h2>Titre 4</h2>
                <p>Description de l’image 4.</p>
                <a href="#" class="cta-button">En savoir plus</a>
            </div>
        </div>
        <div class="slide">
            <img src="../../public/images/slider_img2.jpg" alt="Image 5">
            <div class="overlay">
                <h2>Titre 5</h2>
                <p>Description de l’image 5.</p>
                <a href="#" class="cta-button">En savoir plus</a>
            </div>
        </div>
    </div>
    <button id="nextBtn" class="button">❯</button>
</div>



    </main>

    <script src="../../public/js/produits.js"></script>
    <script src="../../public/js/header.js"></script>
</body>

</html>