<?php
$title = "Liste des Projets";
$options = ['Forfait', 'Assistance', 'Régie']; // Liste des types de projets
ob_start();
?>
<br>
<div class="table-container">
    <table>
        <tr>
            <th>code Projet</th>
            <th>abrege Projet</th>
            <th>nom Projet</th>
            <th>type Projet</th>
            <th>action</th>
        </tr>
        <?php
        if (!empty($projets)) { // Vérification si $projets contient des données
            foreach ($projets as $projet) {
                echo "<tr>";
                echo "<td>{$projet['codeProjet']}</td>";
                echo "<td>{$projet['abrege']}</td>"; 
                echo "<td>{$projet['nomProjet']}</td>";
                echo '<td>';
                echo '<select name="typeProjet">';
                foreach ($options as $option) {
                    $selected = ($projet['typeProjet'] === $option) ? 'selected' : '';
                    echo "<option value=\"$option\" $selected>$option</option>";
                }
                echo '</select>';
                echo '</td>';
                echo "<td class='colsuppr'>
                        <a href='index.php?action=suppr&codeProjet={$projet['codeProjet']}'>Supprimer</a> | 
                        <a href='index.php?action=modif&codeProjet={$projet['codeProjet']}'>Modifier</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucun projet disponible</td></tr>";
        }
        ?>
        <tr>
            <td colspan="5" style="text-align: center;">
                <a href="index.php?action=ajouter">Ajouter un Projet</a>
            </td>
        </tr>
    </table>
</div>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>
