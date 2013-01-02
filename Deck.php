<?php
/**
 * Namespace declaration
 */
namespace PHPCards;

/**
 * Using namespaces
 */
use PHPCards\Interfaces\CardInterface;
use PHPCards\Exceptions\PHPCardsException;

class Deck
{
	/**
	 * An array of card objects
	 * @var	array
	 */
	protected $_aCards = array();
	
// --------------------------------------------------------------------
	
	/**
	 * Method __construct();
	 * 
	 * Method is creating our deck, you can pass
	 * as many parameters as you want here, all
	 * of them must be card objects with suit, it
	 * is validating each of card for having suit
	 * and for implementing CardInterface, it
	 * can throw an exception so beware, the card
	 * objects are saving in class protected field
	 * 
	 * @access	public
	 * @return	void
	 * @throws	PHPCardsException
	 */
	public function __construct()
	{
		foreach (func_get_args() as $oCard) {
			if (!$oCard instanceof CardInterface) {
				throw new PHPCardsException('Card must implements CardInterface');
			}
			if (!$oCard->getSuit() === null) {
				throw new PHPCardsException('Card does not have suit defined');
			}
			$this->_aCards[] = $oCard;
		}
	}//end of __construct() method
	
// --------------------------------------------------------------------
	
	/**
	 * Method shuffle();
	 * 
	 * Method is shuffling deck of cards to
	 * randomize cards in our deck, after this
	 * deck is ready to hand cards to players
	 * it should be more random in future
	 * but it is nice for now
	 * 
	 * @access	public
	 * @todo		Make it more randomize in future
	 * @return	boolean	Result of shuffling
	 */
	public function shuffle()
	{
		return shuffle($this->_aCards);
	}//end of shuffle() method
	
// --------------------------------------------------------------------
	
	/**
	 * Method getCardsAmount();
	 * 
	 * Method is counting how many cards we
	 * have in our deck, the returning value
	 * is integer and it is result of count
	 * function
	 * 
	 * @access	public
	 * @return	integer	Amount of cards in deck
	 */
	public function getCardsAmount()
	{
		return count($this->_aCards);
	}//end of getCardsAmount() method
	
}//end of Deck Class
