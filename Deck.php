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
use PHPCards\Player;

class Deck
{
	/**
	 * An array of card objects
	 * @var	array
	 */
	protected $_aCards = array();
	
	/**
	 * Deck shuffled state
	 * @var	boolean
	 */
	protected $bShuffled = false;
	
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
	 * Method dealCards();
	 * 
	 * Method is giving cards to player, you can
	 * define how many cards it should gave player
	 * and you must define player object where the
	 * cards are sending, method is also validating
	 * shuffle state, and number of cards in deck
	 * so you can't gave more cards to player than
	 * you have in your deck, each of card selected
	 * for player is removed from deck by array_values
	 * to make array keys nice
	 * 
	 * @access	public
	 * @param	integer	$iCards	How many cards to give
	 * @param	object	$oPlayer	Object of player
	 * @return	object	Object of deck
	 * @throws	PHPCardsException
	 */
	public function dealCards($iCards, Player $oPlayer)
	{
		if ($this->_bShuffled === false) {
			throw new PHPCardsException('You must shuffle cards before dealing it');
		}
		if (!is_object($oPlayer) || !method_exists($oPlayer, 'setCards')) {
			throw new PHPCardsException('Invalid player object');
		}
		if ($this->getCardsAmount() < $iCards) {
			throw new PHPCardsException('You cannot give more cards than is in deck');
		}
		
		$aCards = array();
		for ($i = 0; $i <= $iCards-1; $i++) {
			$aCards[] = $this->_aCards[$i];
			unset($this->_aCards[$i]);
		}
		$this->_aCards = array_values($this->_aCards);
		$oPlayer->setCards($aCards);
		return $this;
	}//end of dealCards() method
	
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
		$this->_bShuffled = true;
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
