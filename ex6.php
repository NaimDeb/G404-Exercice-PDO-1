<?php

require_once("./sql/connect_db.php");

$sql = "SELECT * FROM `shows` ORDER BY `title` ASC";

try {

    $stmt = $db->query($sql);
    $shows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}
?>

<div style="display: flex; flex-wrap: wrap; width:80%; margin: auto; gap:3px;">

<?php
foreach ($shows as $key => $show) {
    ?>
    <div style='background-color:lightblue ; padding:5px 15px 5px 0; width:fit-content;'> 
        <ul>
            <li><?= $show["title"] ?></li>
            <li>Spectacle par : <?= $show["performer"] ?> <br> le : <?= $show["date"] ?> à : <?= $show["startTime"] ?>
        
        </ul> 
    </div>
    <?php
}
?>

</div>