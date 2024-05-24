<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Membres</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="container">
    <a href="ajouter1.php" class="Btn_add">Ajouter un Membre</a>
    <h2>Liste des Membres</h2>
    <?php
    include_once "connexion.php"; 

    $con = mysqli_connect("localhost", "root", "", "gestiondesalle");

    if (!$con) {
        die("Erreur de connexion: " . mysqli_connect_error());
    }

    $req = mysqli_query($con, "SELECT ID, Nom, Prenom, Adresse, Telephone FROM membre");
    if (mysqli_num_rows($req) == 0) {
        echo "Il n'y a pas encore de membre ajouté.";
    } else {
        echo '<table>';
        echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Téléphone</th></tr>';
        while ($row = mysqli_fetch_assoc($req)) {
    ?>
            <tr>
                <td><?= htmlspecialchars($row['ID']) ?></td>
                <td><?= htmlspecialchars($row['Nom']) ?></td>
                <td><?= htmlspecialchars($row['Prenom']) ?></td>
                <td><?= htmlspecialchars($row['Adresse']) ?></td>
                <td><?= htmlspecialchars($row['Telephone']) ?></td>
            </tr>
    <?php
        }
        echo '</table>';
    }
    mysqli_close($con);
    ?>
</div>

</body>
</html>
