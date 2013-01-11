<?php
/**
 * Namespace declaration
 */
namespace PHPCards\Exceptions;

/**
 * Class PHPCardsInterfaceException
 * 
 * This is exception class which should be 
 * thrown when class is not implementing an
 * interface, for example each of card class
 * should implements CardInterface if not
 * then this exception should be thrown, to
 * inform programmer about this
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Exceptions
 * @package     php-cards
 * @since       06.01.2013
 * @version     1.0 <01.01.2013>
 */
class PHPCardsInterfaceException extends \LogicException
{
    
}//end of PHPCardsInterfaceException Class
