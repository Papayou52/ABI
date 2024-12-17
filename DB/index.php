<?php
echo "Test d'affichage du fichier index.php";

// Vérifie si le fichier existe avant de le charger
if (file_exists('controlleur.php')) {
    require_once 'controlleur.php';
    
    try {
        // Vérifie si le paramètre action est défini dans l'URL
        if (!isset($_GET["action"])) {
            // Appelle la fonction par défaut pour afficher la liste des projets
            liste_projets(); 
        } else {
            throw new Exception("<h1>Action inconnue : {$_GET['action']}</h1>");
        }
    } catch (Exception $e) {
        // Affiche un message d'erreur
        $msgErreur = $e->getMessage();
        echo "<div style='color:red; font-weight:bold;'>Erreur : {$msgErreur}</div>";
    }
} else {
    die("Erreur : Le fichier 'controlleur.php' est introuvable.");
}
?>
