<?php
/**
 * Namespace declaration
 */
namespace PHPCards;

/**
 * Using namespaces
 */
use PHPCards\Exceptions\PHPCardsTableException;
use PHPCards\Exceptions\PHPCardsInterfaceException;

/**
 * Class Table
 * 
 * This class is describing table in game, you
 * can use it to put player cards on table or 
 * to get already put cards using player object
 * this class should behave like a real table
 * cards on table are sorted by unique identifier
 * of player, so you can get it really simple
 * this class is used when you are calling player
 * method putOnTable(), if you want to get cards
 * from player and there aren't any card this
 * action will throw an exception
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Main
 * @package     php-cards
 * @since       12.01.2013
 * @version     1.0 <12.01.2013>
 */
class Table
{
    /**
     * An array with player cards objects
     * @var array
     */
    protected $_aCards = array();
    
// --------------------------------------------------------------------
    
    /**
     * Method put(); 
     * 
     * Method is putting player card on table
     * it is adding new element of array with
     * player identifier, so cards are sorted
     * by players, and you can get them back
     * using player boject and method called
     * getPlayerCards, method is returning
     * object of table class
     * 
     * @access  public
     * @param   object  $oCard  Card object
     * @param   object  $oPlayer    Player object
     * @return  object  Object of table class
     * @throws  PHPCardsInterfaceException
     */
    public function put($oCard, Player $oPlayer)
    {
        if (!$oCard instanceof CardInterface) {
            throw new PHPCardsInterfaceException('Card must implements CardInterface');
        }
        $sPlayerId = $oPlayer->getIdentifier();
        $this->_aCards[$sPlayerId][] = $oCard;
        return $this;
    }//end of put() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getPlayerCards();
     * 
     * Method is returning player cards putted
     * on a table, if there aren't any cards
     * from this player the exception is thrown
     * cards are sorted by players so you can
     * easly get player cards
     * 
     * @access  public
     * @param   object  $oPlayer    Player object
     * @return  array   Array with card objects
     * @throws  PHPCardsTableException
     */
    public function getPlayerCards(Player $oPlayer)
    {
        $sPlayerId = $oPlayer->getIdentifier();
        if (!isset($this->_aCards[$sPlayerId])) {
            throw PHPCardsTableException('There aren\'t any cards on table from this player');
        }
        return $this->_aCards[$sPlayerId];
    }//end of getCardsByPlayer() method
    
}//end of Table Class
