<?php include 'connexion.php';?>




<span style="text-decoration: underline;">Vérifications :</span>&nbsp;

<?php
    print_r($_COOKIE);
?>

<br />
<br />
<br />


<br />
<form method="get" action="fonctionAdd.php">
    <input type="hidden" name="cookie_name" value="gh">
    <input type="hidden" name="type" value="gh">
    <select name="cookie_val">
        <option selected="selected" value="default1" disabled>Selectionnez une maison d'hote</option>
        <?php
            $reponse = $bdd->query('SELECT DISTINCT nom_chambre FROM chambre');
            while ($donnees = $reponse->fetch())
            {
        ?>
        <option value="<?php echo $donnees['nom_chambre']; ?>" ><?php echo $donnees['nom_chambre']; ?></option>
        <?php
            }
        ?>
    </select>
    <input type="submit" value="Add Cookie">
</form>

<br />
<form method="get" action="fonctionAdd.php">
    <input type="hidden" name="cookie_name" value="act">
    <input type="hidden" name="type" value="act">
    <select name="cookie_val">
        <option selected="selected" value="default1" disabled>Selectionnez une acitivite </option>
        <?php
            $reponse = $bdd->query('SELECT DISTINCT nom_activite FROM activites');
            while ($donnees = $reponse->fetch())
            {
        ?>
        <option value="<?php echo $donnees['nom_activite']; ?>" ><?php echo $donnees['nom_activite']; ?></option>
        <?php
            }
        ?>
    </select>
    <input type="submit" value="Add Cookie">
</form>