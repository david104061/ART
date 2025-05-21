<!-- Pour La connexion en Base de Donnée -->

<?php 

    $host = "localhost";
    $dbname = "bd_projets_perso";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
        $pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        echo"Connexion reussie";
    } catch (PDOException $e) {
        die("Erreur de Connexion à la Base de donnée : " . $e->getMessage());
    }

?>