
<?php
$title = "Ajouter un Projet";
ob_start();
?>
<br><br>

<form action= "index.php?action=ajouter" method="POST" id="monform">
    
    <label for="abrege">abregeProjet</label>
    <input type="text" name="abrege" id="abrege" value="<?php if (!empty($_POST["abrege"])) {
                                                    echo $_POST["prenom"];} ?>" autocomplete="off">
    <span class="erreur"><?php if (!empty($erreurs["abrege"])) {
        echo $erreurs["abrege"];} ?>
    </span>
    <br><br>
    <label for="nomProjet">nom Projet</label>
    <input type="text" name="nomProjet" id="nomProjet" value="<?php if (!empty($_POST["nomProjet"])) {
                                                    echo $_POST["nomProjet"];} ?>" autocomplete="off">
    <span class="erreur"><?php if (!empty($erreurs["nomProjet"])) {
        echo $erreurs["nomProjet"];} ?>
    </span>
    <br><br>
    <label for="typeProjet">type Projet</label>
    <input type="text" name="typeProjet" id="typeProjet" value="<?php if (!empty($_POST["typeProjet"])) {
                                                    echo $_POST["typeProjet"];} ?>" autocomplete="off">
    <span class="erreur"><?php if (!empty($erreurs["typeProjet"])) {
        echo $erreurs["typeProjet"];} ?>
    </span>
    <br><br>

    <input type="submit" id="submit" value="Envoyer">
    <input type="reset" id="reset" value="Annuler">
</form>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>