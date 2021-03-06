<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 2015-08-24
 * Time: 6:22 AM
 */

namespace interfaces;


use abst\Card;

/**
 * This interface function contains all the basic methods needed to created a sorted card list
 *
 * Interface travelSummaryInterface
 * @package interfaces
 */
interface travelSummaryInterface {

    /**
     * CardSort function should contain the sorting algorithm used to sort the cards
     * @return mixed
     */
    public function cardSort();


    /**
     * setCardList is responsible to set the Card list so that it can be used in the sorting algorithm
     * @param $cardListArry
     * @return mixed
     */
    public function setCardList($cardListArry = array());


    /**
     * This method will return the sorted CardList once the sorting is complete
     * @return mixed
     */
    public function getTravelSummary();


}