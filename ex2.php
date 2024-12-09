<?php

require_once("./sql/connect_db.php");

$sql = "SELECT * FROM showTypes";

try {

    $stmt = $db->query($sql);
    $types = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}
?>

<div style="display: flex; flex-wrap: wrap; width:80%; margin: auto; gap:3px;">

<?php
foreach ($types as $key => $type) {
    echo "<div style='background-color:lightgray; padding:5px 15px 5px 0; width:fit-content;'> <ul>";

        echo("<li>" . $type["type"] . "</li>");

    echo "</ul> </div>";
}
?>

</div>