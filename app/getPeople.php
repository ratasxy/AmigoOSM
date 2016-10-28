<?php
 include 'vendor/autoload.php';

 $tinder = new \Pecee\Http\Service\Tinder(
    'YourFBId',
    'YoutFBToken'
 );

 $latitude = $_GET['lat'];
 $longitude = $_GET['pos'];
 $tinder->updateLocation($latitude, $longitude);

 $recommendations = $tinder->recommendations();

 echo json_encode($recommendations);

?>