<?php
/**
 * Namespace declaration
 */
namespace PHPCards\Suits;

/**
 * Using namespaces
 */
use PHPCards\Interfaces\SuitInterface;

class Heart implements SuitInterface
{
	/**
	 * Method __toString();
	 * 
	 * Method is returning clean class name
	 * without namespace, it is creating an
	 * array by explode string by "\" and
	 * then it is returning last element of
	 * array, it will be clean class name
	 * so it can return for example Heart,
	 * Club, Spade or Diamond
	 * 
	 * @access	public
	 * @return	string	Class presented by string
	 */
	public function __toString()
	{
		return array_pop(explode('\\', __CLASS__));
	}//end of __toString() method
	
}//end of Heart Class
