<?php 
session_start();
require('./includes/database.php');
if($_SESSION['email']!= 'admin@gmail.com'){
    header('location:index.php');
}

 $listeReservation =$dbh->query("SELECT * FROM `reservation`");
 $resultReservation = $listeReservation ->fetchAll();

$slot = $dbh->query("SELECT * FROM `slot` WHERE `status`='libre'");
$slotResult = $slot->fetchAll();

if(isset($_POST['delete_button'])){
    $slot_id = $_POST['value_slot_id'];
    $slot_libre = "UPDATE `slot` SET `status`='libre' WHERE id = '$slot_id'";
    $resultSlot_libre = $dbh->prepare($slot_libre );
    $resultSlot_libre->execute();
    
    $delete_id = $_POST['delete_id'];
    $delete = $dbh->query("DELETE FROM `reservation` WHERE id = '$delete_id'");
    header('location:admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <title>rentroom | admin</title>
</head>
<body>
<?php require('./includes/popupInscription.php') ?>
<?php require('./includes/popupConnexion.php') ?>
<?php require('./includes/nav.php') ?>
    <main>

        <div class="container_admin" >
        <h1>Page admin</h1>
        <h2>Liste des réservations</h2>
       
            <table >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>user_id</th>
                        <th>slot_id</th>
                        <th>created_at</th>
                        <th>delete</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <?php foreach( $resultReservation  as $reservation): ?>  
                                <tr>
                                    <?= '<th>'.$reservation['id'].'</th>' ?> 
                                    <?= '<th>'.$reservation['user_id'].'</th>' ?>
                                    <?= '<th>'.$reservation['slot_id'].'</th>' ?>
                                    <?= '<th>'.$reservation['created_at'].'</th>' ?>
                                        <th>
                                            <form method ="POST">
                                                <input type="hidden" name="delete_id" value="<?= $reservation['id'] ?>">
                                                <input type="hidden" name="value_slot_id" value="<?= $reservation['slot_id'] ?>">
                                                <button type="submit" name="delete_button">Delete</button>
                                            </form>
                                        </th>
                                </tr>
                            <?php endforeach; ?>  
                    </tbody>
            </table>
             
            <h2>Liste de slots libre</h2>
            <table id="tableslot">
                <thead id="slot">
                    <tr>
                        <th>id</th>
                        <th>room_id</th>
                        <th>arrival_date</th>
                        <th>departure_date</th>
                        <th>price</th>
                        <th>status</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <?php foreach( $slotResult  as $s): ?>  
                                <tr>              
                                    <div class="slot">
                                    <?= '<th>'.$s['id'].'</th>' ?> 
                                    <?= '<th>'.$s['room_id'].'</th>' ?>
                                    <?= '<th>'.$s['arrival_date'].'</th>' ?>
                                    <?= '<th>'.$s['departure_date'].'</th>' ?>
                                    <?= '<th>'.$s['price'].' €</th>' ?>
                                    <?= '<th>'.$s['status'].'</th>' ?>
                            </div>
                                </tr>
                            <?php endforeach; ?>  
                    </tbody>
            </table>

        </div>
    </main>
    <script src="./script/menu.js"></script>
</body>
</html>