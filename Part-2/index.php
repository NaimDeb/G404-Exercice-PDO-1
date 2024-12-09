<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Patients</title>
    <style>
        /* Styles globaux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f4e8; /* Fond jaune-blanc doux */
            color: #333;
        }

        /* Header */
        header {
            background-color: #2c3e50; /* Bleu sombre */
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 10px 5px 5px black;
        }

        header h1 {
            font-size: 1.5em;
            margin: 0;
        }

        header button {
            background-color: #3498db; /* Bleu clair */
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 0.9em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        header button:hover {
            background-color: #2980b9; /* Bleu plus foncé au survol */
        }

        /* Main */
        main {
            padding: 20px;
            background-color: #f8f4e8; /* Fond jaune-blanc doux */
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); /* Enlève la hauteur du header */
        }

        /* Liste des patients */
        .patient-list {
            background-color: white; /* Fond blanc pour contraste */
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Ombre subtile */
            padding: 20px;
            width: 60%;
            max-width: 800px;
            text-align: center;
        }

        .patient-list h2 {
            margin-top: 0;
            font-size: 1.2em;
            color: #444;
        }

        a {
            font-style: normal;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Gestion des Patients</h1>
        <button> <a href="./ex1-ajout-patient.php">Créer un patient</a> </button>
    </header>
    <main>
        <div class="patient-list">
            <h2>Liste des patients</h2>
            <p>Aucun patient n'est disponible pour le moment.</p>
        </div>
    </main>
</body>
</html>
