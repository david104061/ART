<?php 

    session_start();

    if(!isset($_SESSION["roles"]) || $_SESSION["roles"] !== "Admin") 
    {
        die("Accès refusé");
    }

?>

<?php 

    echo "Je suis un Admin";

?>