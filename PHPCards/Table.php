<?php
/**
 * Namespace declaration
 */
namespace PHPCards;

class Table
{
    public function __construct()
    {
        
    }//end of __construct() method
    
    public function put($oCard, Player $oPlayer)
    {
        if (!$oCard instanceof CardInterface) {
            throw new PHPCardsException('Card must implements CardInterface');
        }
        $this->_aCards[] = $oCard;
        return $this;
    }//end of put() method
    
}//end of Table Class
