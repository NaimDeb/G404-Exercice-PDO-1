<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    require_once '../utils/connect_db.php';
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


$sql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
 VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";

try {
    $stmt = $db->prepare($sql);
    $users = $stmt->execute([
        ':lastname' => $lastName,
        ':firstname' => $firstName,
        ':birthdate' => $birthdate,
        ':phone' => $phone,
        ':mail' => $mail
    ]);

    header("Location: ../ex1-ajout-patient.php?status=success");



} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}



} else {
    header("Location: ../ex1-ajout-patient.php?status=1");
}
