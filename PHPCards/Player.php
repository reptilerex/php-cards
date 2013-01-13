<?php
/**
 * Namespace declaration
 */
namespace PHPCards;

/**
 * Using namespaces
 */
use PHPCards\Exceptions\PHPCardsPlayerException;
use PHPCards\Table;

/**
 * Class Player
 * 
 * This class is describing player in game, you
 * can use it to sort player cards by suits, by
 * points or by suit and points, you can also
 * get player cards and put card on a table, if
 * you are creating object of player, he will
 * get his unique identifier made by ip, user
 * agent and some random values, it could be
 * useful, this class should behave like a one 
 * of real player
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Main
 * @package     php-cards
 * @since       03.01.2013
 * @version     1.0 <02.01.2013>
 */
class Player
{
    /**
     * An array of player cards
     * @var array
     */
    protected $_aCards = array();
    
    /**
     * Player unique identifier it is using to serializing
     * so the serialized value is random for each player
     * @var string
     */
    protected $_sIdentifier = null;
    
// --------------------------------------------------------------------
    
    /**
     * Method __construct();
     * 
     * Method is creating player identifier it
     * is sha256 hash made by player IP address
     * and by his browser user agent, it is also
     * microtime added to make it more randomize
     * the value is storing into protected field
     * in player class, you can access to it by
     * getIdentifier method
     * 
     * @access  public
     * @return  void
     */
    public function __construct()
    {
        $sIpAddress = $_SERVER['REMOTE_ADDR'];
        $sUserAgent = $_SERVER['HTTP_USER_AGENT'];
        $sString = (microtime().'|'.$sUserAgent.'|'.$sIpAddress.'|'.mt_rand());
        $this->_sIdentifier = hash('sha512', $sString);
    }//end of __construct() method
    
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
     * Method putOnTable();
     * 
     * Method is putting selected card on table
     * it needs integer value to set player card
     * and object of table where the card should
     * be put, if there aren't card on position
     * which you set the exception will be thrown
     * after putting card on table, selected card
     * is removing from player cards, at the end
     * method is returning object of player
     * 
     * @access  public
     * @param   integer $iPosition  Card position
     * @param   object  $oTable Object of table
     * @return  object  Object of player
     * @throws  PHPCardsPlayerException
     */
    public function putOnTable($iPosition, Table $oTable)
    {
        if (!isset($this->_aCards[$iPosition])) {
            throw new PHPCardsPlayerException('There aren\'t any card on '.$iPosition.' position');
        }
        
        $oTable->put($this->_aCards[$iPosition], $this);
        unset($this->_aCards[$iPosition]);
        return $this;
    }//end of putOnTable() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getIdentifier();
     * 
     * Method is returning unique for player
     * identifier, it was made by construct
     * using user agent, ip address and also
     * microtime, it could be usefull to set
     * player properly
     * 
     * @access  public
     * @return  string
     */
    public function getIdentifier()
    {
        return base64_encode(serialize($this));
    }//end of getIdentifier() method
    
// --------------------------------------------------------------------
    
    /**
     * Method bid();
     * 
     * Method is setting new player bid into an
     * array which is protected property of class
     * setting value must be numeric, if not an
     * exception will thrown, biddings are sorted
     * by player so you can easily get it, it is
     * returning object of player class
     * 
     * @access  public
     * @param   float   $fValue     Value of player bid
     * @param   object  $oBidding   Object of bidding class
     * @return  object  Object of plaryer class
     */
    public function bid($fValue, Bidding $oBidding)
    {
        $oBidding->setBid($fValue, $this);
        return $this;
    }//end of bid() method
    
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
