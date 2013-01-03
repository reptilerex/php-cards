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
 * Class King
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
class King implements CardInterface
{    
    /**
     * Amount of points for this card
     * @var integer
     */
    protected $_sPoints = 11;
    
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
     * it can return for example King-Club or
     * King-Spade, Nine-Heart etc, if suit is
     * not defined it can return only card name
     * for example King, King, Nine, Ten etc
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
        return array_pop(explode('\\', __CLASS__));
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
        return (int)$this->sPoints;
    }//end of getPoints() method
    
}//end of King Class
