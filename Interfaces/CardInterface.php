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
 * @author		Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category	Interfaces
 * @package		php-cards
 * @since		01.01.2013
 * @version		1.0 <01.01.2013>
 */
interface CardInterface {
	
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
	public function setPoints();
	
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
	public function getPoints();
	
}//end of CardInterface
