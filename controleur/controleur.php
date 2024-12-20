<?php

include 'modele/modele.php';
    
    function liste_projets(){
        $projets = get_all_projets();
        require "vue/listeProjets.php";
        }

        function liste_role(){
        $role = get_all_role();
        return $role;
        //require "vue/ajoutUtilisateur.php";
        }

    function liste_users(){
        $users = get_all_user();
        require "vue/listeUtilisateur.php";
    }

        
    
    function ajouter_projet($abrege, $nomProjet, $typeProjet) {
        // Appel de la fonction renommée dans le modèle
        insert_projet($abrege, $nomProjet, $typeProjet);
    
        // Recharge la liste des projets après l'ajout
        $projets = get_all_projets();
    
        // Affiche la liste des projets dans la vue
        require "vue/listeProjets.php";
    }

    function supprimer_projet($codeProjet){

        delete_projet_by_id($codeProjet);
        $projets = get_all_projets();
        require "vue/listeProjets.php";
    
    }
    
    //Fonction de controle de  connexion au Site
    function controleConnexion($login,$password){

        $connexion = connexionSite($login,$password);
        $tErreurs = []; // initialise le tableau d'erreurs
        if (empty($login)){
            $tErreurs['login'] = "Champ vide";
        }
        if (empty($password)){
            $tErreurs['password'] = "Champ vide";
        }
        if(empty($tErreurs)) {
            if($connexion === false){
                $tErreurs['erreur'] = 'Utilisateur inconnu ou mot de passe incorrect';
                return $tErreurs;
            }
        } else 
        return $tErreurs;
    }

    function controleUser($user,$password1,$password2,$role){
        $tErreurs = []; // initialise le tableau d'erreurs
        if (empty($user)){
            $tErreurs['utilisateur'] = "Champ vide";
        }
        if (empty($password1)){
            $tErreurs['password1'] = "Champ vide";
        }
        if (empty($password2)){
            $tErreurs['password2'] = "Champ vide";
        }
        if (empty($role)){
            $tErreurs['typeRole'] = "Choisissez un rôle";
        }
        if ($password1 !== $password2) {
            $tErreurs['erreur'] = "Les mots de passe doivent correspondre";
        }
        return $tErreurs;
    }
     
    

    function control_form_fields($abrege, $nomProjet, $typeProjet) {
        $tErreurs = []; // initialise le tableau d'erreurs
        if (empty($abrege)) {// je teste le champ prenom
            $tErreurs['abrege'] = "Il faut remplir le champ prenom.";
        } elseif (!preg_match("/^[a-zA-Z-]{2,}$/", $abrege)) {// perg_match expression reguliere
            $tErreurs['abrege'] = "Le champ abrege doit comporter au moins 2 caractères alphabétiques sans chiffres.";
        }
        if (empty( $nomProjet)) {
            $tErreurs['nomProjet'] = "Il faut remplir le champ nomProjet.";
        } elseif (!preg_match("/^[a-zA-Z-]{2,}$/", $nomProjet)) {
            $tErreurs['nomProjet'] = "Le nomProjet doit comporter au moins 2 caractères alphabétiques sans chiffres.";
        }
        if (empty( $typeProjet)) {
            $tErreurs['typeProjet'] = "Il faut remplir le champ typeProjet.";
        } elseif (!preg_match("/^[a-zA-Z-]{2,}$/", $typeProjet)) {
            $tErreurs['typeProjet'] = "Le typeProjet doit comporter au moins 2 caractères alphabétiques sans chiffres.";
        }
        return $tErreurs; // elle me retourne un tableau d'erreurs qui fera un element de test dans mon routeur index.php
    }

  function liste_clients(){
    $clients = get_all_clients();
    require "vue/listesclients.php";
}

  function accueil(){
       require 'vue/login.php';
    }
        
?>











