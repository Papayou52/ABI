<?php
$title = "Accueil";
ob_start();
?>

<?php
$content = ob_get_clean();
include "baselayout.php";
?>