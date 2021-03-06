<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 2015-08-24
 * Time: 9:30 AM
 */

namespace test;
include_once "../autoload.php";

class TravelSummaryTest  extends \PHPUnit_Framework_TestCase {


    /**
     * test_cardSort is a test case to validate the output of the card Sort in case of valid and invalid data
     * valid data all the cards will come back in sorted order
     * Invlaid data an error exception will be thrown.
     */
    public function test_cardSort()
    {


        // Valid Travel cards
        $cardList = [["desc"=>"Flight from Dubai Airport to Dabolim Airport Goa ",
            "fromPoint"=>"Dubai Airport",
            "toPoint"=>"Goa Airport",
            "mode"=>"Plane",
            "seatNo"=>"F43434"
        ],["desc"=>"Metro from Internet City to Bur Dubai bus stop ",
            "fromPoint"=>"International City",
            "toPoint"=>"Bur Dubai Stop",
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


        //Card Factory
        $factoryCard = new \classes\FactoryCard();

        //Correct Travel cards Cards
        $cardReturn = $factoryCard->getCards($cardList);


        //Travel Summary
        $travelSummary = new \classes\TravelSummary();
        $travelSummary->setCardList($cardReturn);
        $processedList = $travelSummary->getTravelSummary();

        //Checing for the desired output
        $this->assertEquals(4, count($processedList));



        // In valid travel cards

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


        //Try catch  block to catch the exception
        try {
            $factoryCard = new \classes\FactoryCard();
            $cardReturn = $factoryCard->getCards($cardList);

            $travelSummary = new \classes\TravelSummary();
            $travelSummary->setCardList($cardReturn);
            $processedList = $travelSummary->getTravelSummary();
            $this->setExpectedException('Exception');
        }
        catch (\Exception $e) {

            $this->assertEquals("Invalid Cards", $e->getMessage());

        }



    }

}