<?php
/**
 * Namespace declaration
 */
namespace PHPCards;

/**
 * Using namespaces
 */
use PHPCards\Exceptions\PHPCardsBiddingException;

/**
 * Class Bidding
 * 
 * This class is describing bidding in game, you
 * can use it to set bids by players, you can also
 * getting the best bid, and player which bid is
 * actual the best, also you can calculate the
 * pool and there is a method which you can use
 * to get latest player card on table using player
 * object, all of bids are stored as protected
 * property of class, sorted by players so you
 * can easily using that,  this class should 
 * behave like a real bidding system when you are
 * playing
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Main
 * @package     php-cards
 * @since       13.01.2013
 * @version     1.0 <13.01.2013>
 */
class Bidding
{
    /**
     * An array with player biddings
     * @var array
     */
    protected $_aBiddings = array();
    
// --------------------------------------------------------------------
    
    /**
     * Method setBid();
     * 
     * Method is setting new player bid into an
     * array which is protected property of class
     * setting value must be numeric, if not an
     * exception will thrown, biddings are sorted
     * by player so you can easily get it, it is
     * returning object of bidding class
     * 
     * @access  public
     * @param   float   $fValue     PLayer bid
     * @param   object  $oPlayer    Player object
     * @param   object  $oScores    Object of scores where you are storing player money
     * @return  object  Object of bidding class
     * @throws  PHPCardsBiddingException
     */
    public function setBid($fValue, Player $oPlayer, Scores $oMoney)
    {
        $fPlayerMoney = $oMoney->getPlayerScore($oPlayer);
        if (!is_numeric($fValue)) {
            throw new PHPCardsBiddingException('The bid must be a numeric value');
        }
        if ($fValue > $fPlayerMoney) {
            throw new PHPCardsBiddingException('The bid can\'t be greater than money of player');
        }
       
        $sPlayerId = $oPlayer->getIdentifier();
        $this->_aBiddings[$sPlayerId][] = $fValue;
        return $this;
    }//end of bid() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getTheBestBid();
     * 
     * Method is returning the highest value of
     * bids the highest value, it is using an
     * array where are all of bids, its searching
     * the highest value and returning it if it
     * found it, when there aren't any bids the
     * zero value is returning (0.00)
     * 
     * @access  public
     * @return  float   The highest value
     */
    public function getTheBestBid()
    {
        $fTheBest = 0.00;
        foreach ($this->_aBiddings as $aBiddings) {
            asort($aBiddings);
            if ($aBiddings[0] > $fTheBest) {
                $fTheBest = $aBiddings[0];
            }
        }
        return $fTheBest; 
    }//end of getTheBestBid() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getTheBestBidPlayer();
     * 
     * Method is returning player object which
     * bids the highest value, it is using an
     * array key (serialized object of player)
     * it is searching the highest value and
     * unserializing object when it found it
     * object of player is returning
     * 
     * @access  public
     * @return  object  Object of player
     */
    public function getTheBestBidPlayer()
    {
        $oPlayer = null;
        $fTheBest = 0.00;
        foreach ($this->_aBiddings as $sPlayer => $aBiddings) {
            asort($aBiddings);
            if ($aBiddings[0] > $fTheBest) {
                $oPlayer = unserialize(base64_decode($sPlayer));
                $fTheBest = $aBiddings[0];
            }
        }
        return $oPlayer; 
    }//end of getTheBestBid() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getLatestPlayerBid();
     * 
     * Method is returning latest player bid
     * if there aren't any bids from player
     * which you set as parameter, the zero
     * value is returning,  it is returning 
     * last element of array of player bids
     * 
     * @access  public
     * @param   object  $oPlayer    Player object
     * @return  float
     * @throws  PHPCardsBiddingException
     */
    public function getLatestPlayerBid(Player $oPlayer)
    {
        $sPlayerId = $oPlayer->getIdentifier();
        $fValue = 0.00;
        if (isset($this->_aBiddings[$sPlayerId])) {
            $fValue = end($this->_aBiddings[$sPlayerId]);
        }
        return $fValue;
    }//end of getLatestPlayerBid() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getPool();
     * 
     * Method is returing total value of pool
     * it is summing all bids from all players
     * and returning it, if there aren't any
     * bid the 0.00 value is returning, you
     * can use it to calculate pool for win
     * for example pool is 15000 and player
     * which won will get 15000 points or
     * money or whatever you want ;)
     * 
     * @access  public
     * @return  float
     */
    public function getPool()
    {
        $fTotal = 0.00;
        foreach ($this->_aBiddings as $aPlayerBiddings) {
            $fTotal += array_sum($aPlayerBiddings);
        }
        return $fTotal;
    }//end of getPool() method
    
}//end of Bidding Class
