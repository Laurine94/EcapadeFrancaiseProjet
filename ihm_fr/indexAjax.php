<?php
include 'connexion.php';
?>

<?php
if (isset ($_POST["genre"])) {
    $req = $bdd->prepare("SELECT * FROM ville WHERE genre = ? ORDER BY ville ");
    $req->execute(array ($_POST["genre"]));
    echo "<select name=ville id=ville>";
    while ($donnees = $req->fetch()) {
        echo "<option value='" .htmlspecialchars ($donnees["id"]) . "'>" . $donnees["ville"] . "</option>";
    }
    echo "</select>";
}
?>

