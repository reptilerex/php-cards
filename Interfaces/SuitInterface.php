<?php
/**
 * Namespace declaration
 */
namespace PHPCards\Interfaces;

interface SuitInterface
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
     * @access  public
     * @return  string  Class presented by string
     */
    public function __toString();
    
// --------------------------------------------------------------------
    
    /**
     * Method setPrioritySort();
     * 
     * Method is setting new priority level of
     * sorting by suits, you can decide which
     * suit have priority in sorting, so for
     * example you can set sorting to Heart
     * Spade, Diamond, Spade or whatever you
     * want, it is user-friendly becouse, suits
     * should be separated (red-black-red-black)
     * 
     * @access  public
     * @param   integer $iPriority  New priority of sorting
     * @return  object  Object of suit
     */
    public function setPrioritySort($iPriority);
      
// --------------------------------------------------------------------
    
    /**
     * Method getPrioritySort();
     * 
     * Method is returning priority level of
     * sorting, it is protected value so you
     * need this method to get it, it is very
     * required if player can sort his cards
     * you can decide which suit have priority 
     * in sorting, so for example you can set 
     * sorting to Heart Spade, Diamond, Spade 
     * Or whatever you want, it is user-friendly 
     * becouse, suits should be separated 
     * (red-black-red-black)
     * 
     * @access  public
     * @return  integer Priority of sorting level
     */
    public function getPrioritySort();
    
}//end of SuitInterface
