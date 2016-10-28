<?php
 include 'vendor/autoload.php';

 $tinder = new \Pecee\Http\Service\Tinder(
    '626532086',
    'EAAGm0PX4ZCpsBACCccayCiCtiWTa4wnNfLnvwMGbHGDKYvwVrUVZAJJPUM6NnAVeA4r5AZBW1bUqVlaNZBnztpLiUnhkQIFGKf9luLa9WF6C6wJdXUA830AYWmt5COTEtZBCZCXEx4LSyttedTgH6Bv9sm1HDbO0aKJWGZCF6F7PUt7NbsqrMlRkinZAxMIeaRw1amEAq6m4Q1a1V6y1v0WZBYgNRH0TUsfCKJYMa0wBBpgZDZD'
 );

 $latitude = $_GET['lat'];
 $longitude = $_GET['pos'];
 #$tinder->updateLocation($latitude, $longitude);

 $recommendations = $tinder->recommendations();

 echo json_encode($recommendations);

?>