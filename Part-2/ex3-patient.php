<?php

require_once("./utils/connect_db.php");

$id = $_GET["id"];

$sql = "SELECT * FROM `patients` WHERE id = :id";

try {
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$patient) {
        echo "Aucun patient trouvé avec cet ID.";
        exit;
    }
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche du Patient</title>
    <style>
                /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header */
        header {
            background-color: #0073e6;
            color: white;
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
        }

        header nav {
            margin-top: 10px;
        }

        header .btn-create {
            text-decoration: none;
            background-color: #ffcc00;
            color: #333;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }

        header .btn-create:hover {
            background-color: #ffd633;
        }

        /* Main container */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px); /* Full page minus header height */
            padding: 20px;
        }

        /* Patient full card */
        .patient-details {
            background-color: #e6f7ff;
            padding: 20px;
            border: 1px solid #0073e6;
            border-radius: 8px;
            width: 500px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .patient-full-card h2 {
            margin-bottom: 20px;
            color: #0073e6;
        }

        .patient-full-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        .patient-full-card ul li {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.5;
        }

    </style>
</head>
<body>
    <header>
        <h1>Fiche du Patient</h1>
        <nav>
            <a href="./index.php" class="btn-create">Retour à la liste</a>
        </nav>
    </header>

    <main>
        <div class="patient-details">
            <div class="patient-full-card">
                <h2><?= htmlspecialchars($patient["firstname"]) ?> <?= htmlspecialchars($patient["lastname"]) ?></h2>
                <ul>
                    <li><strong>Date de naissance :</strong> <?= htmlspecialchars($patient["birthdate"]) ?></li>
                    <li><strong>Téléphone :</strong> <?= htmlspecialchars($patient["phone"]) ?></li>
                    <li><strong>Mail :</strong> <?= htmlspecialchars($patient["mail"]) ?></li>
                    <li><strong>Notes :</strong> <?= htmlspecialchars($patient["notes"] ?? "Aucune note disponible.") ?></li>
                </ul>
            </div>
        </div>
    </main>
</body>
</html>
