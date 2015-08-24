<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 2015-08-24
 * Time: 5:40 AM
 */

namespace classes;
use interfaces\travelSummaryInterface;

/**
 * This Class is responsible in producing a travel summary with all the cards arranged in the correct order.
 *
 * I case there is a requirement to change TravelSummary sorting  .. Just create a new class and implement the travelSummaryInterface.
 * now Implement the new sort function in that new class.
 *
 * Class TravelSummary
 * @package classes
 */
class TravelSummary implements travelSummaryInterface {

    // List of Cards
    protected $cardList ;

    //List of sorted cards
    protected $processedList = array();

    //List of cards left to be sorted
    protected $unProcessedList= array();

    // Tracking the loop counter.
    protected $conttracker = 0;

    /**
     * This is a recursive sorting function
     * 1) First it will take one card as a sorted card
     * 2) It will loop throught the cards and sort the cards based on the first card
     * 3) At the end of the loop there will be an array of sorted cards and may be a set of cards that could not find their sorted position
     * 4)The sort function will be called again with the unsorted cards so that they can find their sorted position in the sorted cards list.
     * 5) This process will go on till all the cards are sorted
     * 6) Best time O(n)   and  worst time O(n2)
     *
     * CardSort function should contain the sorting algorithm used to sort the cards
     * @return mixed    getFromPoint setFromPoint
     */
    public function cardSort()
    {



            foreach ($this->cardList as $key => $selcardList) {
                if (count($this->processedList) == 0) {
                    $this->processedList[$key] = $selcardList;


                } else {
                    // Front of the processed list
                    $front = reset($this->processedList);
                    $fromPoint = $front->getFromPoint();

                    //Back of the processed list
                    $back = end($this->processedList);
                    $toPoint = $back->getToPoint();

                    //Checking if current card can go to the front or back of the processed list

                    if ($selcardList->getFromPoint() == $toPoint) {
                        //Put this card to the back of the list
                        $this->processedList[$key] = $selcardList;

                    } else if ($selcardList->getToPoint() == $fromPoint) {

                        // Put this card in the front of the processed list
                        array_unshift($this->processedList, $selcardList);


                    } else {
                        //Put it in the unprocessed list and will come for a second round

                        $this->unProcessedList[$key] = $selcardList;

                    }

                }

            }


            $this->conttracker++;

            if ($this->conttracker > 20) {

                throw new \Exception("Invalid Cards");
             }

            if (count($this->unProcessedList) > 0) {

                $this->cardList = $this->unProcessedList;
                $this->unProcessedList = null;
                $this->cardSort();
            }
            return;






    }

    /**
     * setCardList is responsible to set the Card list so that it can be used in the sorting algorithm
     * @param $cardListArry
     * @return mixed
     */
    public function setCardList($cardListArry = array())
    {
        $this->cardList = $cardListArry;
    }




    /**
     * Returns the travel summary of sorted cards...
     */
    public function  getTravelSummary()
    {

        $this->cardSort();

        return $this->processedList;
    }
}