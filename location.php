<?php
session_start();
require('./includes/database.php');
require('./includes/flash.php');
$id = $_GET['id'];
$city = $_GET['city'];
$room_id = $_GET['room_id'];
//room et slot
$req = $dbh->query("SELECT *
FROM `slot` 
LEFT JOIN `room` 
ON slot.`room_id` = room.`id`
WHERE slot.`id` = $_GET[id]");
$result = $req->fetchAll(); 

//feedback
$feed = $dbh->query("SELECT * 
FROM slot 
JOIN room  
ON slot.room_id = room.id 
JOIN feedback 
ON feedback.room_id = room.id 
WHERE slot.id = $_GET[id]
ORDER BY feedback.created_at DESC");
$resultFeed = $feed->fetchAll();  

//liste d'images
$images = $dbh->query("SELECT * FROM `room` WHERE `city` = '$city'");
$resultImages = $images->fetchAll(); 

//moyenne
    $moyenne  = $dbh->query("SELECT AVG(`score`) 
    FROM slot 
    JOIN room 
    ON slot.room_id = room.id 
    JOIN feedback 
    ON feedback.room_id = room.id 
    WHERE slot.id = $_GET[id]");
    $resultMoyenne  = $moyenne ->fetchAll();  

    if(isset($_POST['button1'])) { session_unset();}

    require('./includes/commentaireScript.php'); 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="icon" href="./assets/meeting.png" />
    <title>Location</title>
    
</head>
<body>
<?php require('./includes/popupInscription.php') ?>
    <?php require('./includes/popupConnexion.php') ?>
    <?php require('./includes/nav.php') ?>
    <main>
 
       
        <div class="location"> 
            <?php foreach($result as $roomSlot): ?>                                
                <h1><?= $roomSlot['name'] ?> 
                </h1>
                <div class="adress"> 
                
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FDA11C" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    <span><?php foreach($resultMoyenne as $moy): ?>
                    <?= $note = round($moy['AVG(`score`)'], 2)  ?>
                    <?php endforeach; ?></span>

                <img src="./assets/pin.png" alt="pin">
                   <p> <?= ' '.$roomSlot['address'].' ,'. $roomSlot['zip_code'].' '.$roomSlot['city'] .' '.$roomSlot['country'] ?></p>
                </div>

                <div class="parent">
                        <div class="div1">
                            <img src="<?= $roomSlot['picture_url'] ?>" alt="room"> 
                        </div>
                        <div class="div2"> 
                            
                    <h2>Description</h2>
                        <p><?= $roomSlot['description'] ?></p>
                        
                    <h2>Informations complémentaires</h2>
                        <div class="date">
                            <div class="cat1">
                                        <svg xmlns="http://www.w3.org/2000/svg" color='#61016B'; width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        <?php $createDate = $roomSlot['arrival_date'] ;                     
                                        $date = date("d/m/Y", strtotime($createDate));
                                        echo 'Arrivée: '.$date?>
                                        <?= '<p>Capacité : '.$roomSlot['capacity'].' personnes</p> ' ?>  
                            </div>
                    
                            <div class="cat2">
                                         <svg xmlns="http://www.w3.org/2000/svg" color='#61016B'; width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                        </svg>  <?php $createDate = $roomSlot['departure_date'] ;
                                        $date = date("d/m/Y", strtotime($createDate));
                                        echo 'Départ '.$date ?>
                                        <?= '<p>Catégorie : '. $roomSlot['category'].'</p>' ?>
                                    </div>
                                </div>
                                <div class="reservation">
                                            <p><?= 'Tarif : '.$roomSlot['price'].' €'?>
                                            <button href="reservation.php?id=<?= $roomSlot['id']?>">Réserver</></p>
                                </div>
                                
                    </div>
                </div>
                <?php endforeach; ?>


                <br>
                <h2 id='produit'>Autres produits à <?= $roomSlot['city'] ?></h2>
                <div class="images">
                <?php foreach($resultImages as $images): ?>    
                    <a href="./location.php?id=<?= $images['id']?>&city=<?= $images['city']?>">
                    <img width="200" height="200"src="<?= $images['picture_url'] ?>" alt="room">
                </a>      
    <?php endforeach; ?>
    </div>
        
    <?php require('./includes/comment.php') ?>


</main>
<script src="./script/menu.js"></script>
</body>
</html>