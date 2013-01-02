<?php
/**
 * Namespace declaration
 */
namespace PHPCards\Cards;

/**
 * Using namespaces
 */
use PHPCards\Interfaces\CardInterface;

/**
 * Class Ace
 * 
 * This class is describing one of cards, you can 
 * find here information about this card, and you 
 * can use it to perform some actions, each card 
 * is presented as separate class and object, so
 * it is very simillar to real life, just use your
 * imagination and be more creative
 * 
 * @author		Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category	Cards
 * @package		php-cards
 * @since		01.01.2013
 * @version		1.0 <01.01.2013>
 */
class Ace implements CardInterface {
	
	/**
	 * Amount of points for this card
	 * @var	integer
	 */
	protected $_sPoints = 11;
	
// --------------------------------------------------------------------
	
	/**
	 * Method setPoints();
	 * 
	 * Method is setting new value of points
	 * for this card, the new value is juggling
	 * to integer type, becouse points can be
	 * only integer values
	 * 
	 * @access	public
	 * @param	integer	$iPoints	Points for this card
	 * @return	object	Object of card class
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
	 * @access	public
	 * @return	integer	Points for this card
	 */
	public function getPoints()
	{
		return (int)$this->sPoints;
	}//end of getPoints() method
	
}//end of Ace Class
