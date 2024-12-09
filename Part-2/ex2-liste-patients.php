<?php

require_once("./utils/connect_db.php");

$sql = "SELECT * FROM `patients`";

try {
    $stmt = $db->query($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Liste des Patients</title>
</head>
<body>
    <header>
        <h1>Gestion des Patients</h1>
        <nav>
            <a href="ex-1-ajout-patient.php" class="btn-create">Créer un patient</a>
        </nav>
    </header>

    <main>
        <div class="patient-container">
            <?php
            foreach ($patients as $key => $patient) {
            ?>
                <div class="patient-card">
                    <ul>
                        <li><strong>Nom :</strong> <?= htmlspecialchars($patient["lastname"]) ?></li>
                        <li><strong>Prénom :</strong> <?= htmlspecialchars($patient["firstname"]) ?></li>
                        <li><strong>Date de naissance :</strong> <?= htmlspecialchars($patient["birthdate"]) ?></li>
                        <li><strong>Téléphone :</strong> <?= htmlspecialchars($patient["phone"]) ?></li>
                        <li><strong>Mail :</strong> <?= htmlspecialchars($patient["mail"]) ?></li>
                        <li>
                            <a href="./ex3-patient.php?id=<?= urlencode($patient['id']) ?>">Voir fiche du patient</a>
                        </li>
                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
</body>
</html>
