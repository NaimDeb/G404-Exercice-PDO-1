<?php
$allDone = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// Erreur 1, vérifier tt les post
if (!isset($_POST["lastName"],$_POST["firstName"],$_POST["birthdate"], $_POST["phone"], $_POST["mail"])){
    header("Location: ex1-ajout-patient.php?status=1");
    return;
}
// Erreur 2, vérifier si empty
if (
    empty($_POST['firstName']) ||
    empty($_POST['lastName']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['phone']) ||
    empty($_POST['mail'])
) {
    header('location: ex1-ajout-patient.php?status=2');
    return;
}

$firstName = htmlspecialchars(trim($_POST['firstName']));
$lastName = htmlspecialchars(trim($_POST['lastName']));
$birthdate = htmlspecialchars(trim($_POST['birthdate']));
$phone = htmlspecialchars(trim($_POST['phone']));
$mail = htmlspecialchars(trim($_POST['mail']));


$allDone = true;



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body style="margin: auto; width:fit-content ";>


    <?php 
    if(!$allDone){
    ?>


    <h1>Formulaire d'inscription</h1>
    <form action="" method="post">
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

};

    if (isset($_GET["status"]) && $_GET["status"] == "success") {
        echo "<p style='color:green;'> Succès ! </p>";
        echo "<br>";
        echo $firstName;
        echo "<br>";
        echo $lastName;
        echo "<br>";
        echo $birthdate;
        echo "<br>";
        echo $phone;
        echo "<br>";
        echo $mail;
        echo "<br>";


        // sendToSql();
        echo "<p> Vous allez être redirigé dans quelques secondes, si ça ne marche pas, <a href='./index.php'> cliquez ici !</a></p>";

        // Marche pas
        // header("refresh:5;Location: ./index.php");
    }


    
    ?>
</body>
</html>
