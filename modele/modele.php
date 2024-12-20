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

    // Fonction connexion au site (cherche si l'utilisateur existe)
    function connexionSite($login,$password){
        $connexion = connect_db();
        $sql = "SELECT passUser  FROM `users` WHERE loginUser = :login";
        $reponse =$connexion->prepare($sql);
        $reponse->bindParam(':login',$login,PDO::PARAM_STR);
        $reponse->execute();
        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        if ($resultat !== null && $resultat != '')  {
            $hash = password_hash($resultat['passUser'],PASSWORD_DEFAULT);
            return password_verify($password,$hash);
        } else return false;
    }
    
    //Fonction get_all_role (cherche la liste des rôles pour faire la liste de choix)
    function get_all_role(){
        $connexion = connect_db();
        $role = [];
        $sql = "SELECT typeRole FROM `roles` WHERE idRole != 1";
        
        
        foreach($connexion->query($sql)as $row) {
            $role[] = $row;
        }
        return $role;
    }
    

    

    // Création de la liste des projets
    function get_all_projets(){

        $connexion = connect_db();
        $projets = array();
        $sql = "SELECT * from projets";

        foreach ($connexion->query($sql) as $row) {
            $projets[] = $row;
        }
        return $projets;
    }

    //Création liste utilisateurs
    function get_all_user(){
        $connexion = connect_db();
        $users = [];
        $sql = "SELECT users.idUser, users.loginUser, users.passUser, roles.typeRole FROM users inner JOIN roles on users.idRole = roles.idRole";

        foreach ($connexion->query($sql)as $row) {
            $users[] = $row;
        }
        return $users;
    }

    function get_projet_by_id($codeProjet)
{

    $connexion = connect_db();
    $sql = "SELECT * from projets WHERE codeProjet = :codeProjet";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':id', $codeProjet, PDO::PARAM_INT);
    $reponse->execute();
    return $reponse->fetch();
}

    function delete_projet_by_id($codeProjet)
    {
        $connexion = connect_db();
        $sql = " DELETE FROM projets WHERE codeProjet = :codeProjet ";
        $reponse = $connexion->prepare($sql);
        $reponse->bindValue(":codeProjet", intval($codeProjet), PDO::PARAM_INT);
        $reponse->execute();
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
    

    function ajouter_user($user,$password,$role){
        $connexion = connect_db();
        $sql = "INSERT INTO `users`(`loginUser`, `passUser`, `idRole`) VALUES ('$user','$password','$role')";
        $reponse = $connexion->prepare($sql);
        $reponse->execute();
    }

    function typeRole_to_idRole($typeRole){
        $connexion = connect_db();
        $sql ="SELECT `idRole` FROM `roles` WHERE `typeRole` = :role;";
        $reponse = $connexion->prepare($sql);
        $reponse->bindParam(':role',$typeRole);
        $reponse->execute();
        return $reponse->fetch();
    }


      // Création de la liste des clients
      function get_all_clients(){

    $connexion = connect_db();
    $clients = array();
    $sql = "SELECT * from clients";

    foreach ($connexion->query($sql) as $row) {
        $clients[] = $row;
    }
    return $clients;
}

?>