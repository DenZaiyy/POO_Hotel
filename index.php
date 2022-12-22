<?php
require 'class/Client.php';
require 'class/Hotel.php';
require 'class/Reservation.php';
require 'class/Chambre.php';

$hotel1 = new Hotel("Hilton", "10 route de la Gare", 67000, "Strasbourg", 30);
$hotel2 = new Hotel("Regent",  "61 Rue Dauphine", 75006, "Paris", 10);

$client = new Client("Murmann", "Micka");
$client2 = new Client("Gibello", "Virgile");

$chambre1 = new Chambre("Chambre 1", 120, false, true, $hotel1);
$chambre2 = new Chambre("Chambre 2", 120, false, true, $hotel1);
$chambre3 = new Chambre("Chambre 3", 120, false, true, $hotel1);
$chambre4 = new Chambre("Chambre 4", 120, false, true, $hotel1);
$chambre16 = new Chambre("Chambre 16", 300, true, true, $hotel1);
$chambre17 = new Chambre("Chambre 17", 300, true, true, $hotel1);
$chambre18 = new Chambre("Chambre 18", 300, true, true, $hotel1);
$chambre19 = new Chambre("Chambre 19", 300, true, true, $hotel1);

$chambre20 = new Chambre("Chambre 20", 300, true, true, $hotel2);
$chambre21 = new Chambre("Chambre 21", 300, true, true, $hotel2);

$reserv1 = new Reservation($client2, $chambre17, "01-01-2021", "01-01-2021");
$reserv2 = new Reservation($client, $chambre3, "11-03-2021", "15-03-2021");
$reserv3 = new Reservation($client, $chambre4, "01-04-2021", "17-04-2021");

// $client->cancelReservation($reserv2);
// $client2->cancelReservation($reserv1);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9cf79281fe.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>POO_Hotel</title>
</head>

<body>
    <style>
        p {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            margin: 15px;
        }

        .main div {
            margin-bottom: 20px;
        }

        .container {
            margin: 0;
            padding: 0;
            float: left;
            width: 38%;
        }
    </style>
    <div class="main">
        <div class="hotel">
            <div id="hotel_1"><?php echo $hotel1; ?></div>
        </div>
        <div class="reservation_hotel">
            <div id="reservHotel_1"><?php $hotel1->afficherReservation(); ?></div>
            <div id="reservHotel_2"><?php $hotel2->afficherReservation(); ?></div>
        </div>
        <div class="reservation_client">
            <div id="reservClient_1"><?php echo $client->afficherReservation(); ?></div>
            <div id="reservClient_2"><?php echo $client2->afficherReservation(); ?></div>
        </div>
        <div class="container">
            <div class="table-responsive-sm">
                <div id="statutHotel_1"><?php echo $hotel1->afficherStatutHotel(); ?></div>
                <div id="statutHotel_2"><?php echo $hotel2->afficherStatutHotel(); ?></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>