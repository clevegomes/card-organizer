<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 2015-08-24
 * Time: 3:49 AM
 */




namespace test;
use classes\FactoryCard;

include_once "../autoload.php";

/**
 * This is a PHPUnit test class for the Factory Card Class
 * Class FactoryCardTest
 * @package test
 */

class FactoryCardTest extends \PHPUnit_Framework_TestCase {

    /**
     * test_getValidCards : Is a unit test to test for valid cards
     * Expected output 2 results in the array
     */
    public function test_getValidCards()
    {
        $cardList = [["desc"=>"Bus pick up from Bur Dubai to Dubai Airport",
            "fromPoint"=>"Bur Dubai",
            "toPoint"=>"Dubai Airport",
            "mode"=>"Bus",
            "seatNo"=>"3W332"
             ],
            ["desc"=>"Flight from Dubai Airport to Dabolim Airport Goa ",
                "fromPoint"=>"Dubai",
                "toPoint"=>"Goa",
                "mode"=>"Plane",
                "seatNo"=>"F43434"
            ]];

        $factoryCard = new \classes\FactoryCard();
        $cardReturn = $factoryCard->getCards($cardList);

        $this->assertEquals(2, count($cardReturn));

    }


/*
 * test_getInvalidCards: Testing for output with invalid cards
 *
 * Expected output an empty array...
 */
    public function test_getInvalidCards()
    {
        $cardList = [["desc"=>"Bus pick up from Bur Dubai to Dubai Airport",
            "fromPoint"=>"Bur Dubai",
            "toPoint"=>"Dubai Airport",
            "mode"=>"Taxi",
            "seatNo"=>"3W332"
        ],
            ["desc"=>"Flight from Dubai Airport to Dabolim Airport Goa ",
                "fromPoint"=>"Dubai",
                "toPoint"=>"Goa",
                "mode"=>"Ship",
                "seatNo"=>"F43434"
            ]];

        $factoryCard = new \classes\FactoryCard();
        $cardReturn = $factoryCard->getCards($cardList);

        $this->assertEquals(0, count($cardReturn));

    }

}
