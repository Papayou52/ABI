<?php
    require("connect.php");

    // Connexion à la BDD
    function connect_db() {
        $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
        try {
            $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            $connexion = new PDO($dsn, USER, PASSWD, $option);
            //echo "Connexion réussie";  // Message de confirmation
        } catch (PDOException $e) {
            printf("Echec connexion : %s\n", $e->getMessage());
            exit();
        }
        return $connexion;
    }

    // Création de la liste des Stagiaires
    function get_all_projets(){

        $connexion = connect_db();
        $projets = array();
        $sql = "SELECT * from projets";

        foreach ($connexion->query($sql) as $row) {
            $projets[] = $row;
        }
        return $projets;
    }
    function insert_projet($abrege, $nomProjet, $typeProjet) {
        $connexion = connect_db();
        $sql = "INSERT INTO projets(abrege, nomProjet, typeProjet) VALUES (:abrege, :nomProjet, :typeProjet)";
        $reponse = $connexion->prepare($sql);
        $reponse->bindParam(':abrege', $abrege);
        $reponse->bindParam(':nomProjet', $nomProjet);
        $reponse->bindParam(':typeProjet', $typeProjet);
        $reponse->execute();
    }
    
?>