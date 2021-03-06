<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 2015-08-24
 * Time: 4:41 AM
 */

include_once "../autoload.php";


$cardList = [["desc"=>"Flight from Dubai Airport to Dabolim Airport Goa ",
    "fromPoint"=>"Dubai Airport",
    "toPoint"=>"Goa Airport",
    "mode"=>"Plane",
    "seatNo"=>"F43434"
],["desc"=>"Metro from Internet City to Bur Dubai bus stop ",
    "fromPoint"=>"International City",
    "toPoint"=>"Bur Dubai Stopww",
    "mode"=>"Metro",
    "seatNo"=>"663434"
],["desc"=>"Dabolim Airport Goa to Malaysia Airport",
    "fromPoint"=>"Goa Airport",
    "toPoint"=>"Malaysia Airport",
    "mode"=>"Plane",
    "seatNo"=>"97der"
],["desc"=>"Bus pick up from Bur Dubai to Dubai Airport",
    "fromPoint"=>"Bur Dubai Stop",
    "toPoint"=>"Dubai Airport",
    "mode"=>"Bus",
    "seatNo"=>"3W332"
]];

//$cardList = [["desc"=>"Bus pick up from Bur Dubai to Dubai Airport",
//    "fromPoint"=>"Bur Dubai",
//    "toPoint"=>"Dubai Airport",
//    "mode"=>"Taxi",
//    "seatNo"=>"3W332"
//],
//    ["desc"=>"Flight from Dubai Airport to Dabolim Airport Goa ",
//        "fromPoint"=>"Dubai",
//        "toPoint"=>"Goa",
//        "mode"=>"Ship",
//        "seatNo"=>"F43434"
//    ]];

$factoryCard = new \classes\FactoryCard();
$cardReturn = $factoryCard->getCards($cardList);


$travelSummary = new \classes\TravelSummary();
$travelSummary->setCardList($cardReturn);

try {

    $processedList = $travelSummary->getTravelSummary();
}
catch (\Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    die();
}


print_r($processedList);
exit;

