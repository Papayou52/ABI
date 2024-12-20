
<?php
$title = "Ajouter Utilisateur";
ob_start();
//  var_dump($_POST["utilisateur"]);
//  var_dump($_POST["password1"]);
//  var_dump($_POST["password2"]);
//  var_dump($_POST["typeRole"]);
//  var_dump($erreurs);
// var_dump($_SERVER["REQUEST_METHOD"]);

//var_dump($erreur);
?>
<br><br>

<form action= "index.php?action=ajouter_user" method="POST" id="monform">
    
    <label for="utilisateur">Nom utilisateur</label>
    <input type="text" name="utilisateur" id="utilisateur" value="<?php if (!empty($_POST["utilisateur"])) {
                                                    echo $_POST["utilisateur"];} ?>" autocomplete="off">
    <span class="erreur text-danger"><?php if (!empty($erreurs["utilisateur"])) {
        echo $erreurs["utilisateur"];} ?>
    </span>
    <br><br>
    <label for="password1">Mot de passe</label>
    <input type="password" name="password1" id="password1" value="<?php if (!empty($_POST["password1"])) {
                                                    echo $_POST["password1"];} ?>" autocomplete="off">
    <span class="erreur text-danger"><?php if (!empty($erreurs["password1"])) {
        echo $erreurs["password1"];} ?>
    </span>
    <br><br>
    <label for="password2">Confirmer mot de passe</label>
    <input type="password" name="password2" id="password2" value="<?php if (!empty($_POST["password2"])) {
                                                    echo $_POST["password2"];} ?>" autocomplete="off">
    <span class="erreur text-danger"><?php if (!empty($erreurs["password2"])) {
        echo $erreurs["password2"];} ?>
    </span>
    <br><br>
    <span class="erreur text-danger"><?php if (!empty($erreurs["erreur"])) {
        echo $erreurs["erreur"];} ?>
    <select name="typeRole" id="typeRole" class="form-select  mb-3 text-center" aria-label="Large select example">
        <option value="" selected >Choisissez un rôle</option>
        <?php 
        foreach($role as $row){
            echo "<option value='" . $row['typeRole'] . "'>" . $row['typeRole'] . "</option>";       
        }
        ?>
    </select>
    <span class="erreur text-danger"><?php if (!empty($erreurs["typeRole"])) {
        echo $erreurs["typeRole"];} ?>
    </span>


    <br>

    <input type="submit" id="submit" value="Envoyer">
    <input type="reset" id="reset" value="Annuler">
</form>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>
<?php
//if (isset($_POST["utilisateur"]) && isset($_POST["password1"]) && isset($_POST["password2"]) && isset($_POST["typeRole"])){echo "All is set";}
?>