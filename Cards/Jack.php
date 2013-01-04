<?php
/**
 * Namespace declaration
 */
namespace PHPCards\Cards;

/**
 * Using namespaces
 */
use PHPCards\Interfaces\CardInterface;
use PHPCards\Interfaces\SuitInterface;
use PHPCards\Exceptions\PHPCardsException;

/**
 * Class Jack
 * 
 * This class is describing one of cards, you can 
 * find here information about this card, and you 
 * can use it to perform some actions, each card 
 * is presented as separate class and object, so
 * it is very simillar to real life, just use your
 * imagination and be more creative
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Cards
 * @package     php-cards
 * @since       01.01.2013
 * @version     1.0 <01.01.2013>
 */
class Jack implements CardInterface
{    
    /**
     * Amount of points for this card
     * @var integer
     */
    protected $_sPoints = 2;
    
    /**
     * The suit of card (Spade, Club, Heart or Diamond)
     * @var object
     */
    protected $_oSuit = null;
    
// --------------------------------------------------------------------
    
    /**
     * Method __toString();
     * 
     * Method is presenting object as string
     * it gets clean class name and name of
     * suit, which that card using and then it
     * is making string with "-" separator, so 
     * it can return for example Jack-Club or
     * King-Spade, Nine-Heart etc, if suit is
     * not defined it can return only card name
     * for example Jack, King, Nine, Ten etc
     * 
     * @access  public
     * @return  string  Class presented by string
     */
    public function __toString()
    {
        $sSuit = $this->getSuitName();
        $sCard = $this->getCardName();
        return $sCard.(!empty($sSuit) ? '-'.$sSuit : '');
    }//end of __toString() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getSuitName();
     * 
     * Method is juggling suit object to string
     * so it uses __toString() method to get a
     * name of selected suit for this card, if
     * suit is not defined, method will return
     * empty string value
     * 
     * @access  public
     * @return  string  Suit name
     */
    public function getSuitName()
    {
        return (string)$this->_oSuit;
    }//end of getSuitName() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getSuitPrioritySorting();
     * 
     * Method is returning priority level of
     * sorting, it is very required if player 
     * can sort his cards, you can decide which 
     * suit have priority in sorting, so for 
     * example you can set  sorting to Heart Spade, 
     * Diamond, Club or whatever you want, it is 
     * user-friendly becouse, suits should be 
     * separated (red-black-red-black)
     * 
     * @access  public
     * @return  integer Priority of sorting level
     */
    public function getSuitPrioritySorting()
    {
        return $this->_oSuit->getPrioritySort();
    }//end of getSuitPrioritySorting() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getCardName();
     * 
     * Method is returning clean class name
     * without namespace, it is creating an
     * array by explode string by "\" and
     * then it is returning last element of
     * array, it will be clean class name
     * 
     * @access  public
     * @return  string  Name of class
     */
    public function getCardName()
    {
        $aNames = explode('\\', __CLASS__);
        return array_pop($aNames);
    }//end of getCardName() method
    
// --------------------------------------------------------------------
    
    /**
     * Method setSuit();
     * 
     * Method is setting suit for this card it
     * is also validationg object of suit for
     * implementing SuitInterface, each of suit
     * classes must implements SuitInterface
     * method is returning object of this card
     * so you can use method chaining
     * 
     * @access  public
     * @param   object  $oSuit  Object of suit
     * @return  object  Object of card
     * @throws  PHPCardsException
     */
    public function setSuit($oSuit)
    {
        if (!$oSuit instanceof SuitInterface) {
            throw new PHPCardsException('Suit must implements SuitInterface');
        }
        $this->_oSuit = $oSuit;
        return $this;
    }//end of setSuit() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getSuit();
     * 
     * Method is returning object of suit for
     * this card, it can be object or null
     * Deck class is validating each card for
     * having suit, so don't worry about that 
     * 
     * @access  public
     * @return  object  Object of suit
     */
    public function getSuit()
    {
        return $this->_oSuit;
    }//end of getSuit() method
    
// --------------------------------------------------------------------
    
    /**
     * Method setPoints();
     * 
     * Method is setting new value of points
     * for this card, the new value is juggling
     * to integer type, becouse points can be
     * only integer values, method is returning
     * object of this card, so you can use method
     * chaining here
     * 
     * @access  public
     * @param   integer $iPoints    Points for this card
     * @return  object  Object of card class
     */
    public function setPoints($iPoints)
    {
        $this->_sPoints = (int)$iPoints;
        return $this;
    }//end of setPoints() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getPoints();
     * 
     * Method is returning amount of points
     * for this card, the returning value
     * is integer, each of cards can have
     * different amount of points but it is
     * always integer value
     * 
     * @access  public
     * @return  integer Points for this card
     */
    public function getPoints()
    {
        return (int)$this->_sPoints;
    }//end of getPoints() method
    
}//end of Jack Class
