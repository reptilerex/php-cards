<?php
/**
 * Namespace declaration
 */
namespace PHPCards;

class Player
{    
    /**
     * An array of player cards
     * @var array
     */
    protected $_aCards = array();
    
// --------------------------------------------------------------------
    
    /**
     * Method setCards();
     * 
     * Method is setting cards to player it is
     * calling by Deck class in dealCards method
     * an array of cards object are setting to
     * class protected property, method returning
     * object of player
     * 
     * @access  public
     * @param   array   $aCards Array of cards objects
     * @return  object  Object of player
     */
    public function setCards($aCards)
    {
        $this->_aCards = $aCards;
        return $this;
    }//end of setCards() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getCards();
     * 
     * Method is returning an array of player
     * cards, if player don't have any cards
     * yet then empty array is returning, so
     * by this method you can see what cards
     * your player already have
     * 
     * @access  public
     * @return  array   Array of player cards objects
     */
    public function getCards()
    {
        return $this->_aCards;
    }//end of getCards() method
    
}//end of Player Class
