
<?php
    $title = "Ajouter un Projet";
    ob_start();
    ?>
    <br><br>

    <!-- Formulaire stylé avec Bootstrap -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Veuillez remplir les champs</h2>
        
        <!-- Formulaire avec une largeur de 50% -->
        <form action="index.php?action=ajouter" method="POST" id="monform" class="needs-validation">
            <div class="row justify-content-center">
                <div class="col-md-6"> <!-- Définit la largeur à 50% (col-md-6) de ma page -->
                    
                    <!-- Champ pour abrege Projet -->
                    <div class="mb-3">
                        <label for="abrege" class="form-label">Abrege Projet</label>
                        <input type="text" class="form-control <?php if (!empty($erreurs["abrege"])) echo 'is-invalid'; ?>" 
                            name="abrege" id="abrege" 
                            value="<?php echo !empty($_POST["abrege"]) ? ($_POST["abrege"]) : ''; ?>" 
                            autocomplete="off">
                        <?php if (!empty($erreurs["abrege"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["abrege"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Champ pour nom Projet -->
                    <div class="mb-3">
                        <label for="nomProjet" class="form-label">Nom Projet</label>
                        <input type="text" class="form-control <?php if (!empty($erreurs["nomProjet"])) echo 'is-invalid'; ?>" 
                            name="nomProjet" id="nomProjet" 
                            value="<?php echo !empty($_POST["nomProjet"]) ? ($_POST["nomProjet"]) : ''; ?>" 
                            autocomplete="off">
                        <?php if (!empty($erreurs["nomProjet"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["nomProjet"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Champ pour type Projet -->
                    <div class="mb-3">
                        <label for="typeProjet" class="form-label">Type Projet</label>
                        <input type="text" class="form-control <?php if (!empty($erreurs["typeProjet"])) echo 'is-invalid'; ?>" 
                            name="typeProjet" id="typeProjet" 
                            value="<?php echo !empty($_POST["typeProjet"]) ? ($_POST["typeProjet"]) : ''; ?>" 
                            autocomplete="off">
                        <?php if (!empty($erreurs["typeProjet"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["typeProjet"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    $content = ob_get_clean();
    include "baselayout.php";
?>
