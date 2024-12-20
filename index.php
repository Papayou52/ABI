<?php
if (session_status()==PHP_SESSION_NONE){
    session_start();
}
require_once 'controleur/controleur.php';
// PENSEZ A COMMENTER ET DECOMMENTER LE TRY/CATCH POUR TEST SES PAGES SANS AVOIR A PASSER PAR LA CONNEXION EN ATTENDANT QUE J'AI FINI


//----------- PENSEZ A CREER UN UTILISATEUR DANS LA BASE DE DONNEE POUR VOUS CONNECTER A L'APPLI OU COMMENTER/DECOMMENTER LA SUITE 
// ---------- POUR TESTER VOS PAGES AVEC LE CODE PLUS BAS !!

// -------DEBUT TRY/CATCH A COMMENTER/DECOMMENTER
// -------DEBUT TRY/CATCH A COMMENTER/DECOMMENTER
// -------DEBUT TRY/CATCH A COMMENTER/DECOMMENTER

try {
    if (!isset($_GET["action"])) {
        accueil();
      } elseif ($_GET["action"] ==="login"){
              if  ($_SERVER["REQUEST_METHOD"] === "POST"){
                  if (isset($_POST["login"]) && isset($_POST["password"])){
                      $erreur = controleConnexion($_POST["login"],$_POST["password"]);
                      if (empty($erreur)) {
                      $_SESSION['login'] = true;
                      require "vue/accueil.php";
                      } else {
                      require "vue/login.php";
                      }
                  }
          }
      } elseif($_GET["action"] == 'user'){
        liste_users();
        //"vue/ajoutUtilisateur.php";
      } elseif($_GET["action"] =='ajouter_user'){
        $role = liste_role();
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                //liste_role();
                // Vérifie si tous les champs nécessaires sont fournis
                if (isset($_POST["utilisateur"]) && isset($_POST["password1"]) && isset($_POST["password2"]) && isset($_POST["typeRole"])){
                    $erreurs = controleUser($_POST["utilisateur"],$_POST["password1"],$_POST["password2"],$_POST["typeRole"]);
                    if (empty($erreurs)){
                        $idRole = typeRole_to_idRole($_POST["typeRole"]);
                        ajouter_user($_POST["utilisateur"],$_POST["password1"],$idRole['idRole']);
                        liste_users();
                    } else {
                        //liste_role();
                        require "vue/ajoutUtilisateur.php";
                    }
                }
                } else {
                    liste_role();
                    require "vue/ajoutUtilisateur.php";
                     //"vue/ajoutUtilisateur.php";
                }
            

        }elseif (!isset($_GET["action"])) {  // Action à définir pour acceder aux différentes pages (par exemple :  ["action"] == projet pour la liste et (["action"] == projet && ["action"] == suppr
        // pour la fonction de suppression)) Pas définitif juste une idée.
        // Action par défaut : afficher la liste des projets
        liste_projets();
    } else {
        // Vérifie quelle action est demandée
        if ($_GET["action"] == "suppr") {
            if (isset($_GET["codeProjet"])) {
                // Supprimer un projet
                supprimer_projet($_GET["id"]);
            } else {
                throw new Exception("<span style='color:red'>Aucun code projet n'a été envoyé</span>");
            }
        } elseif ($_GET["action"] == "ajouter") {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Vérifie si tous les champs nécessaires sont fournis
                if (isset($_POST["abrege"]) && isset($_POST["nomProjet"]) && isset($_POST["typeProjet"])) {
                    // Validation des champs
                    $erreurs = control_form_fields($_POST["abrege"], $_POST["nomProjet"], $_POST["typeProjet"]);
                    if (empty($erreurs)) {
                        // Ajouter le projet s'il n'y a pas d'erreur
                        ajouter_projet($_POST["nomProjet"], $_POST["abrege"], $_POST["typeProjet"]);
                        // Afficher la liste des projets après ajout
                        liste_projets();
                    } else {
                        // Affiche le formulaire avec les erreurs
                        require "vue/ajoutProjet.php";
                    }
                } else {
                    // Affiche le formulaire si des champs sont manquants
                    require "vue/ajoutProjet.php";
                }
            } else {
                // Affiche le formulaire d'ajout si aucune requête POST n'est reçue
                require "vue/ajoutProjet.php";
            }
        } else {
            // Si l'action est inconnue, lève une exception
            throw new Exception("<h1>Action inconnue : {$_GET['action']}</h1>");
        }
    }
} catch (Exception $e) {
    // Gestion des erreurs
    $msgErreur = $e->getMessage();
    echo "<div style='color:red; font-weight:bold;'>Erreur : {$msgErreur}</div>";
}

// --------FIN TRY/CATCH A COMMENTER/DECOMMENTER-------------
// --------FIN TRY/CATCH A COMMENTER/DECOMMENTER-------------
// --------FIN TRY/CATCH A COMMENTER/DECOMMENTER-------------




// ------------CODE POUR TESTER SIMPLEMENT DES LES PAGES-------------
// ------------CODE POUR TESTER SIMPLEMENT DES LES PAGES-------------



// /!\-------- CODE DE TEST --> Karima <--

 // if (ect...)


// /!\-------- CODE DE TEST --> FEFA <--

   // if (!isset($_GET["action"])) 
        
    //    liste_clients();



// /!\-------- CODE DE TEST --> Valentin <--

    // if (!isset($_GET["action"])) {
    //       accueil();
    //     } elseif ($_GET["action"] ==="login"){
    //             if  ($_SERVER["REQUEST_METHOD"] === "POST"){
    //                 if (isset($_POST["login"]) && isset($_POST["password"])){
    //                     $erreur = controleConnexion($_POST["login"],$_POST["password"]);
    //                     if (empty($erreur)) {
    //                     $_SESSION['login'] = true;
    //                     require "vue/accueil.php";
    //                     } else {
    //                     require "vue/login.php";
    //                     }
    //                 }
    //         }
    //     }










   // } catch(Exception $e) {

   // }

?>

