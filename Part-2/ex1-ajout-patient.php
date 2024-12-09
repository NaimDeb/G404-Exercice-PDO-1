<?php

if (isset($_GET["status"]) && $_GET["status"] == "success") {

header("refresh:5;url=./index.php");}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body style="margin: auto; width:fit-content ";>



    <h1>Formulaire d'inscription</h1>
    <form action="./process/process_create_patient.php" method="post">
        <!-- Nom -->
        <label for="lastName">Nom :</label>
        <input type="text" id="lastName" name="lastName" required>
        <br><br>

        <!-- Prénom -->
        <label for="firstName">Prénom :</label>
        <input type="text" id="firstName" name="firstName" required>
        <br><br>

        <!-- Date de naissance -->
        <label for="birthdate">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <br><br>

        <!-- Téléphone -->
        <label for="phone">Téléphone :</label>
        <input type="tel" id="phone" name="phone" placeholder="0123456789" required>
        <br><br>

        <!-- Email -->
        <label for="mail">E-mail :</label>
        <input type="email" id="mail" name="mail" required>
        <br><br>

        <!-- Bouton de soumission -->
        <button type="submit">Envoyer</button>
    </form>





    <?php  

    if (isset($_GET["status"]) && $_GET["status"] == 1) {
        echo "<p style='color:red;> Arrete de casser le code </p>";
    }
    if (isset($_GET["status"]) && $_GET["status"] == 2) {
        echo "<p style='color:red;'> Veuillez remplir tous les champs </p>";
    }


    if (isset($_GET["status"]) && $_GET["status"] == "success") {
        echo "<p style='color:green;'> Succès ! </p>";

        // sendToSql();
        echo "<p> Vous allez être redirigé dans quelques secondes, si ça ne marche pas, <a href='./index.php'> cliquez ici !</a></p>";

        // Marche pas
        
    }


    
    ?>
</body>
</html>
