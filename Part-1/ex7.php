<?php

require_once("./sql/connect_db.php");

$sql = "SELECT * FROM `clients` LIMIT 20";

try {

    $stmt = $db->query($sql);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}
?>

<div style="display: flex; flex-wrap: wrap; width:80%; margin: auto; gap:3px;">

<?php
foreach ($clients as $key => $client) {
    ?>
    <div style='background-color:lightblue ; padding:5px 15px 5px 0; width:fit-content;'> 
        <ul>
            <li>Nom : <?= $client["lastName"] ?></li>
            <li>Prénom : <?= $client["firstName"] ?> </li>
            <li>Date de naissance : <?= $client["birthDate"] ?> </li>
            <li>Carte de fidélité : <?php echo $client["card"] ? "Oui" : "Non" ;?> </li>
            <?php echo $client["card"] ? "<li>Numéro de carte : {$client['cardNumber']} </li>" : "" ?>
        
        </ul> 
    </div>
    <?php
}
?>

</div>