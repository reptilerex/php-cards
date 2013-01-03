<?php
/**
 * Namespace declaration
 */
namespace PHPCards\Interfaces;

/**
 * CardInterface
 * 
 * Each of card classes must implements this
 * Card classes are very simillar, and you
 * can describing all of them in the same
 * way, so that is a reason to use interface
 * all of cards are paper, all of them have
 * the same size, and very very more examples
 * just use your mind and make each of cards
 * implementing this interface
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Interfaces
 * @package     php-cards
 * @since       01.01.2013
 * @version     1.0 <01.01.2013>
 */
interface CardInterface
{
    /**
     * Method __toString();
     * 
     * Method is presenting object as string
     * it gets clean class name and name of
     * suit, which that card using and then it
     * is making string with "-" separator, so 
     * it can return for example Ace-Club or
     * King-Spade, Nine-Heart etc, if suit is
     * not defined it can return only card name
     * for example Ace, King, Nine, Ten etc
     * 
     * @access  public
     * @return  string  Class presented by string
     */
    public function __toString();
    
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
    public function getSuitName();
    
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
    public function getCardName();
    
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
    public function setSuit($oSuit);
    
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
    public function getSuit();
    
// --------------------------------------------------------------------
    
    /**
     * Method setPoints();
     * 
     * Method is setting new value of points
     * for this card, the new value is juggling
     * to integer type, becouse points can be
     * only integer values
     * 
     * @access  public
     * @param   integer $iPoints    Points for this card
     * @return  object  Object of card class
     */
    public function setPoints($iPoints);
    
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
    public function getPoints();
    
}//end of CardInterface
