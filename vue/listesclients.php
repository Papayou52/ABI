<?php
$title = "Liste des clients";
ob_start();
?>
<h1>Liste des clients</h1>
    <table class="montableau">
        <tr>
            <th> ID Client </th>
            <th> Raison sociale </th>
            <th> CA </th>
            <th> Effectif </th>
            <th> Secteur d'activité </th>
        </tr>
        
        
        <?php
            foreach($clients as $client){
                echo "<tr>";
                echo "<td class='colid'> $client[idClient] </td>";
                echo "<td class='colid'> $client[raisonSociale] </td>";
                //echo "<td><a href=index.php?action=mod&id=$stagiaire[id_membre]>$stagiaire[login_membre]</a></td>";
                echo "<td> $client[CA] </td>";
                echo "<td> $client[effectifClient] </td>";
                echo "<td> $client[idSect] </td>";
               // echo "<td class='colsuppr'><a href=index.php?action=suppr&id=$stagiaire[id_membre]>Supprimer</a></td>";
                echo "</tr>";
            }

        ?>
        <tr>    
            <td colspan="5" class="ajout" style="text-align:center"><a href="index.php?action=add" >Ajouter un client</a></td> ;
        </tr>        
    </table>
  
<?php
$content = ob_get_clean();
include "vue/baselayout.php";
?>