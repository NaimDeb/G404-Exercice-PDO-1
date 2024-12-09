<?php

require_once("./sql/connect_db.php");

$sql = "SELECT * FROM clients";

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
    echo "<div style='background-color:lightgray; padding:5px 20px; width:fit-content;'> <ul>";
    foreach($client as $donnee) {
        echo("<li>" . $donnee . "</li>");
    };
    echo "</ul> </div>";
}
?>

</div>