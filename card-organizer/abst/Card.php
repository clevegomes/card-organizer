<?php
/**
 * Created by PhpStorm.
 * User: Cleve
 * Date: 2015-08-24
 * Time: 2:51 AM
 */

namespace abst;
/**
 * Class Card : This class is an abstract Card class and all kinds of cards must extend from this class
 */
abstract class Card {


    // Defines the transport mode of the card
    protected $mode;

    /**
     * gets the mode of the card
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * sets the mode for the card
     * @param mixed $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    // Location departing from
    protected $fromPoint;

    //Location arriving to
    protected $toPoint;

    //Seat No on the transportation
    protected $seatNo;

    //Description about the journey
    protected $desc;

    /**
     * getter for from point
     * @return mixed
     */
    public function getFromPoint()
    {
        return $this->fromPoint;
    }

    /**
     * setter for from point
     * @param mixed $fromPoint
     */
    public function setFromPoint($fromPoint)
    {
        $this->fromPoint = $fromPoint;
    }

    /**
     * getter for toPoint
     * @return mixed
     */
    public function getToPoint()
    {
        return $this->toPoint;
    }

    /**
     * setter for to point
     * @param mixed $toPoint
     */
    public function setToPoint($toPoint)
    {
        $this->toPoint = $toPoint;
    }

    /**
     * getter for seat number
     * @return mixed
     */
    public function getSeatNo()
    {
        return $this->seatNo;
    }

    /**
     * Setter for seat number
     * @param mixed $seatNo
     */
    public function setSeatNo($seatNo)
    {
        $this->seatNo = $seatNo;
    }

    /**
     * Getter for transportation description
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Setter for transportation description
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }


}