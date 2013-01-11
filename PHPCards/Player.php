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
    
// --------------------------------------------------------------------
    
    /**
     * Method sortCardsBySuits();
     * 
     * Method is sorting player cards by their
     * suits, it is using priority level which
     * is defined for all of suits, method is
     * sorting it and replace values in our
     * protected property of class, after that
     * method is returning player object
     * Remember - if you are using sortCardsByPoints
     * and sortCardsBySuits method result will be 
     * different than using sortCardsBySuitsAndPoints
     * 
     * @access  public
     * @return  object  Object of player class
     */
    public function sortCardsBySuits()
    {
        $aSortingBySuit = array();
        foreach ($this->_aCards as $oCard) {
            $aSortingBySuit[$oCard->getSuitPrioritySorting()][] = $oCard;
        }
        ksort($aSortingBySuit);
        
        $this->_aCards = array();
        foreach ($aSortingBySuit as $aCards) {
            foreach ($aCards as $oCard) {
                $this->_aCards[] = $oCard;
            }
        }    
        return $this;
    }//end of sortCardsBySuits() method
    
// --------------------------------------------------------------------
    
    /**
     * Method sortCardsByPoints();
     * 
     * Method is sorting player cards by their
     * points, each of card have their points
     * defined, method is sorting it and replace 
     * values in our protected property of class, 
     * after that method is returning player object
     * Remember - if you are using sortCardsByPoints
     * and sortCardsBySuits method result will be 
     * different than using sortCardsBySuitsAndPoints
     * 
     * @access  public
     * @return  object  Object of player class
     */
    public function sortCardsByPoints()
    {
        $aSortedByPoints = array();
        foreach ($this->_aCards as $oCard) {
            $aSortedByPoints[$oCard->getPoints()][] = $oCard;
        }
        krsort($aSortedByPoints);
        
        $this->_aCards = array();
        foreach ($aSortedByPoints as $aCards) {
            foreach ($aCards as $oCard) {
                $this->_aCards[] = $oCard;
            }
        }    
        return $this;
    }//end of sortCardsBySuits() method
    
// --------------------------------------------------------------------
    
    /**
     * Method sortCardsBySuitsAndPoints();
     * 
     * Method is sorting player cards by their
     * suits and their points each of card have
     * points defined, and each of suit have their
     * priority of sorting defined method is sorting
     * cards and replace  values in our protected 
     * property of class where we are storing player
     * cards, after that method is returning player 
     * object, If you are using this method to sort
     * result will be different than using separately
     * sortCardsBySuits and sortCardsByPoints
     * 
     * @access  public
     * @return  object  Object of player class
     */
    public function sortCardsBySuitsAndPoints()
    {
        $aSortingBySuit = array();
        $aSortedByPoints = array();

        // Sorting by suits
        foreach ($this->_aCards as $oCard) {
            $aSortingBySuit[$oCard->getSuitPrioritySorting()][] = $oCard;
        }
        ksort($aSortingBySuit);
        
        // Sorting by points using suits sorting
        $this->_aCards = array();
        foreach ($aSortingBySuit as $sKey => $aCards) {
            foreach ($aCards as $oOneCard) {
                $aSortedByPoints[$sKey][$oOneCard->getPoints()][] = $oOneCard;
            }
            krsort($aSortedByPoints[$sKey]);
            
            foreach ($aSortedByPoints[$sKey] as $aPoints) {
                foreach ($aPoints as $oCard) {
                    $this->_aCards[] = $oCard;
                }
            }   
        }
        return $this;
    }//end of sortCardsBySuitsAndPoints() method
    
}//end of Player Class
