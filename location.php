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

//Reservation
if(isset($_POST['reservation'])){
    error_reporting (E_ALL ^ E_NOTICE); 
    if($_SESSION['id']==null){
        flashReservation('Vous devez être connecté pour réserver cette salle <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>');
    }

    else{
        flashReservation('');
    $reservation = "UPDATE slot SET status='reserve' WHERE id = '$id'";
    $resultReservation = $dbh->prepare($reservation);
    $resultReservation->execute();
    $insert_reservation = $dbh->query("INSERT INTO `reservation` (`user_id`, `slot_id`) VALUES ('$_SESSION[id]', '$id')");
    $dbh->exec('$insert_reservation');    
    echo "<script>let reserv = alert('Votre réservation a bien été prise en compte, retour au menu principal.')
          window.location.href = 'index.php';
    </script>";  }
}

//Reservatio
if(isset($_POST['research'])){
  header('location:index.php');
}


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
                               
                                 

                                <div class="reservation_header">
                                        <p><?= 'Tarif : '.$roomSlot['price'].' €'?>
                                        <button type="submit" name="reservation">Réserver</></p>
                                </div>
                                <div class="reservation_footer">
                                        <?php if(isset($_SESSION['flashReservation'])): ?>
                                        <?php foreach($_SESSION['flashReservation'] as $flash): ?>
                                        <?= "<div class=flash_reservation>{$flash} </div>" ?>
                                        <?php endforeach; ?>
                                        <?php endif ?>
                                </div>
                          
                    </div>
                </div>
                <?php endforeach; ?>


                <br>
                <h2 id='produit'>Autres produits à <?= $roomSlot['city'] ?></h2>
                <div class="images">
                <?php foreach($resultImages as $images): ?>    
                    <a href="index.php">
                    <img width="200" height="200"src="<?= $images['picture_url'] ?>" alt="room">
                </a>      
    <?php endforeach; ?>
    </div>
        
    <?php require('./includes/comment.php') ?>


</main>
<script src="./script/menu.js"></script>
</body>
</html>