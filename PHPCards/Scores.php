<?php
/**
 * Namespace declaration
 */
namespace PHPCards;

/**
 * Using namespaces
 */
use PHPCards\Exceptions\PHPCardsScoresException;

/**
 * Class Scores
 * 
 * This class is describing scoring in game, you
 * can use it to save player scores, summing it
 * subbing it, you can also get the best player
 * object and also get scores using player object
 * this class should behave like a real scores
 * scores are sorted by unique identifier of 
 * player, so you can get it really simple, scores
 * must be a numeric value, if not the exception
 * will thrown, use it to store players stats
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Main
 * @package     php-cards
 * @since       13.01.2013
 * @version     1.0 <13.01.2013>
 */
class Scores
{
    /**
     * An array with player scores
     * @var array
     */
    protected $_aScores = array();
    
// --------------------------------------------------------------------
  
    /**
     * Method setPlayerScore();
     * 
     * Method is setting new player score which
     * you set as first parameter, scores are
     * sorted by players so you can easily get
     * it back, it is returning object of scores
     * class, score should be numeric value if
     * it not an exception will thrown
     * 
     * @access  public
     * @param   float   $fScore     New score of player
     * @param   object  $oPlayer    Object of player
     * @return  object  Object of scores class
     * @throws  PHPCardsScoresException
     */
    public function setPlayerScore($fScore, Player $oPlayer)
    {
        if (!is_numeric($fScore)) {
            throw new PHPCardsScoresException('Score must be numeric value');
        }
        $sPlayerId = $oPlayer->getIdentifier();
        $this->_aScores[$sPlayerId] = $fScore;
        return $this;
    }//end of setPlayerScore() method
    
// --------------------------------------------------------------------
  
    /**
     * Method addScore();
     * 
     * Method is adding score to total score of
     * player, for example if player have now
     * 500 points and you will add 100 points
     * using this method, player will have 600
     * points at all, if player don't have any
     * scores yet, this method will use method
     * called setPlayerScore, to set his score
     * instead of summing it
     * 
     * @access  public
     * @param   float   $fScore     Score of player
     * @param   object  $oPlayer    Object of player
     * @return  object  Object of scores class
     * @throws  PHPCardsScoresException
     */
    public function addScore($fScore, Player $oPlayer)
    {
        if (!is_numeric($fScore)) {
            throw new PHPCardsScoresException('Score must be numeric value');
        }
        $sPlayerId = $oPlayer->getIdentifier();
        if (!isset($this->_aScores[$sPlayerId])) {
            return $this->setPlayerScore($fScore, $oPlayer);
        }
        $this->_aScores[$sPlayerId] += $fScore;
        return $this;
    }//end of addScore() method
    
// --------------------------------------------------------------------
  
    /**
     * Method subScore();
     * 
     * Method is substracking score of total
     * scores of player, for example if player 
     * have now 500 points and you will sub 100 
     * points using this method, player will have
     * 400 points at all, if player don't have any
     * scores yet, this method will sets zero value
     * and after that will sub score form zero, so
     * player will have minus score
     * 
     * @access  public
     * @param   float   $fScore     Score of player
     * @param   object  $oPlayer    Object of player
     * @return  object  Object of scores class
     * @throws  PHPCardsScoresException
     */
    public function subScore($fScore, Player $oPlayer)
    {
        if (!is_numeric($fScore)) {
            throw new PHPCardsScoresException('Score must be numeric value');
        }
        $sPlayerId = $oPlayer->getIdentifier();
        if (!isset($this->_aScores[$sPlayerId])) {
            $this->_aScores[$sPlayerId] = 0;
        }
        $this->_aScores[$sPlayerId] -= $fScore;
        return $this;
    }//end of subScore() method
    
// --------------------------------------------------------------------
    
    /**
     * Method getPlayerScore();
     * 
     * Method is getting actual player score
     * using player object and his identifier
     * if there aren't any score saved to this
     * player the zero value is returning (0)
     * using this method you can see points
     * scored by player
     * 
     * @access  public
     * @param   object  $oPlayer    Player object
     * @return  float
     */
    public function getPlayerScore(Player $oPlayer)
    {
        $sPlayerId = $oPlayer->getIdentifier();
        if (isset($this->_aScores[$sPlayerId])) {
            return $this->_aScores[$sPlayerId];
        }
        return 0.00;
    }//end of setPlayerScore() method
    
// --------------------------------------------------------------------
  
    /**
     * Method getTheBestPlayer();
     * 
     * Method is returning player object which
     * scores are the best for example Player1
     * have 1500 points and Player2 have 2000
     * points this method will return object
     * of Player2, you can use it to know who
     * won game or who is winning game at the
     * current moment, it can also return null
     * if there aren't any scores stored
     * 
     * @access  public
     * @return  object/null     Player object or null
     */
    public function getTheBestPlayer()
    {
        $aScores = $this->_aScores;
        arsort($aScores);
        $aPlayers = array_keys($aScores);
        if (isset($aPlayers[0])) {
            return unserialize(base64_decode($aPlayers[0]));
        }
        return null;
    }//end of setPlayerScore() method
    
}//end of Scores Class
