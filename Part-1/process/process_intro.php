<?php

require_once("./sql/connect_db.php");

// Validation formulaire

$nom = "";
$prenom = "";


$sql = "INSERT INTO truc(nom,prenom) VALUES  (:nom,  :prenom)";

try {

    $stmt = $db->prepare($sql);
    $users = $stmt->execute(
        [':nom' => $nom,
        ':prenom' => $prenom]
    );

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}



header("Location: ../ex1.php");
exit;