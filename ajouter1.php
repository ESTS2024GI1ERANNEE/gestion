<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Membre</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="container">
    <a href="liste1.php" class="Btn_add">Retour</a>
    <h2>Ajouter un Membre</h2>
    <?php
    $message = "";
    if(isset($_POST['button'])){
        include_once "connexion.php"; 
        $con = mysqli_connect("localhost", "root", "", "gestiondesalle");

        if (!$con) {
            die("Erreur de connexion: " . mysqli_connect_error());
        }

        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $adresse = $_POST['Adresse'];
        $telephone = $_POST['Telephone'];

        $req = mysqli_query($con, "INSERT INTO membre (Nom, Prenom, Adresse, Telephone) VALUES ('$nom', '$prenom', '$adresse', '$telephone')");

        if($req){
            header("location: liste1.php");
            exit;
        } else {
            $message = "Erreur: membre non ajouté.";
        }
    }
    ?>
    <p class="erreur_message"><?= $message ?></p>
    <form action="" method="post">
        <label for="Nom">Nom :</label>
        <input type="text" name="Nom" id="Nom">
        <label for="Prenom">Prénom :</label>
        <input type="text" name="Prenom" id="Prenom">
        <label for="Adresse">Adresse :</label>
        <input type="text" name="Adresse" id="Adresse">
        <label for="Telephone">Téléphone :</label>
        <input type="text" name="Telephone" id="Telephone">
        <input type="submit" value="Ajouter" name="button">
    </form>
</div>

</body>
</html>
