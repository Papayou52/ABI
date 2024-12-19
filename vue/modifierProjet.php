<?php
$title = "Modifier un Projet";
ob_start();
?>

<div class="container mt-4">
    
    
    <!-- Formulaire stylisé avec une largeur de 50% -->
    <form action="index.php?action=modif" method="POST" id="monform" class="needs-validation">
        <div class="row justify-content-center">
            <div class="col-md-6"> <!-- Définit la largeur à 50% (col-md-6) de la page -->
                
                <!-- Champ pour abrege Projet -->
                <div class="mb-3">
                    <label for="abrege" class="form-label">Abrege Projet</label>
                    <input type="text" class="form-control <?php if (!empty($erreurs["abrege"])) echo 'is-invalid'; ?>" 
                        name="abrege" id="abrege" 
                        value="<?= isset($projet['abrege']) ? $projet['abrege'] : ''; ?>" 
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
                        value="<?= isset($projet['nomProjet']) ? $projet['nomProjet'] : ''; ?>" 
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
                        value="<?= isset($projet['typeProjet']) ? $projet['typeProjet'] : ''; ?>" 
                        autocomplete="off">
                    <?php if (!empty($erreurs["typeProjet"])): ?>
                        <div class="invalid-feedback">
                            <?php echo $erreurs["typeProjet"]; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Champ caché pour le codeProjet -->
                <input type="hidden" name="codeProjet" value="<?= isset($projet['codeProjet']) ? $projet['codeProjet'] : ''; ?>">

                <!-- Boutons d'action -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">Modifier</button>
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
