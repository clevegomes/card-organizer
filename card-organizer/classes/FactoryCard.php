<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 2015-08-24
 * Time: 3:28 AM
 */

namespace classes;
use abst\Card;

/**
 * Class FactoryCard: This class is a factory class and its responsible to create the correct card instance based on the card data provided
 * @package classes
 */
class FactoryCard {


    /**
     * Method is responsible to get all the correct card instances
     * Input : An array of card data
     * Output an array of Card instances
     * If card instance cannot be found . Card data will be ignored
     * @param array $cardList
     * @return array
     */
    public function getCards($cardList = array())
    {

        $returnList = [];
        $cardobj = null;
        if(is_array($cardList))
        foreach ( $cardList as $selCard) {



        if($selCard['mode'] == 'Bus')
        {
            $cardobj = new Bus();
            $cardobj->setDesc($selCard['desc']);
            $cardobj->setFromPoint($selCard['fromPoint']);
            $cardobj->setToPoint($selCard['toPoint']);
            $cardobj->setMode($selCard['mode']);
            $cardobj->setSeatNo($selCard['seatNo']);



        }
        else if($selCard['mode'] == 'Plane')
        {
            $cardobj = new Plane();
            $cardobj->setDesc($selCard['desc']);
            $cardobj->setFromPoint($selCard['fromPoint']);
            $cardobj->setToPoint($selCard['toPoint']);
            $cardobj->setMode($selCard['mode']);
            $cardobj->setSeatNo($selCard['seatNo']);

        }
        else if($selCard['mode'] == 'Metro')
        {
            $cardobj = new Metro();
            $cardobj->setDesc($selCard['desc']);
            $cardobj->setFromPoint($selCard['fromPoint']);
            $cardobj->setToPoint($selCard['toPoint']);
            $cardobj->setMode($selCard['mode']);
            $cardobj->setSeatNo($selCard['seatNo']);

        }

        if($cardobj instanceof Card)
            array_push($returnList,$cardobj);

        }

        return $returnList;

    }


}