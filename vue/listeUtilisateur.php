<?php
$title = "";
ob_start();
//session_start();
?>
<br><br>
<h2>Liste utilisateur</h2>
<br>
<div class="table-container">
<table>
    <tr>
        <th>Identifiant</th>
        <th>Mot de passe</th>
        <th>Rôle</th>
        <th>action</th>
    </tr>
    <?php
   
   foreach ($users as $user) {
    $pwlen = strlen($user['passUser']);
    $hiddenpw = str_repeat('*',$pwlen);
    echo "<tr>";
    echo "<td>{$user['loginUser']}</td>";
    echo "<td>{$hiddenpw}</td>"; 
    echo "<td>{$user['typeRole']}</td>";
    
    echo "<td class='colsuppr'><a href=index.php?action=suppr&codeProjet=$user[idUser]>Supprimer</a></td>";
    echo "<td class='colsuppr'><a href=index.php?action=modif&codeProjet=$user[idUser]>Modifier</a></td>";
    echo "</tr>";

}
    ?>
     <tr><td id='montd' colspan='4'><a href="index.php?action=ajouter_user">Ajouter un utilisateur</a></td></tr>
</table>
</div>

<?php
$content = ob_get_clean();
include "baselayout.php";  // Inclure le baselayout avec le contenu
?>
