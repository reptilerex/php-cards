<?php
/**
 * Namespace declaration
 */
namespace PHPCards\Suits;

/**
 * Using namespaces
 */
use PHPCards\Interfaces\SuitInterface;

/**
 * Class Club
 * 
 * This class is describing one of suits, you can 
 * find here information about this suit, and you 
 * can use it to perform some actions, each suit 
 * is presented as separate class and object, so
 * it is very simillar to real life, just use your
 * imagination and be more creative, each of suit
 * have unique name, also you can set priority of
 * sorting for each of suits, you can get name of 
 * suit using __toString() method, all of suits
 * should implements SuitInterface
 * 
 * @author      Maciej Strączkowski <m.straczkowski@gmail.com>
 * @category    Cards
 * @package     php-cards
 * @since       02.01.2013
 * @version     1.0 <01.01.2013>
 */
class Club implements SuitInterface
{
    /**
     * Priority in sorting by suits
     * @var integer
     */
    protected $_iPrioritySort = 4;
    
// --------------------------------------------------------------------
    
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
    public function __toString()
    {
        $aNames = explode('\\', __CLASS__);
        return array_pop($aNames);
    }//end of __toString() method
    
// --------------------------------------------------------------------
    
    /**
     * Method setPrioritySort();
     * 
     * Method is setting new priority level of
     * sorting by suits, you can decide which
     * suit have priority in sorting, so for
     * example you can set sorting to Heart
     * Spade, Diamond, Club or whatever you
     * want, it is user-friendly becouse, suits
     * should be separated (red-black-red-black)
     * 
     * @access  public
     * @param   integer $iPriority  New priority of sorting
     * @return  object  Object of suit
     */
    public function setPrioritySort($iPriority)
    {
        $this->_iPrioritySort = (int)$iPriority;
        return $this;
    }//end of setPrioritySort() method
      
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
     * sorting to Heart Spade, Diamond, Club 
     * Or whatever you want, it is user-friendly 
     * becouse, suits should be separated 
     * (red-black-red-black)
     * 
     * @access  public
     * @return  integer Priority of sorting level
     */
    public function getPrioritySort()
    {
        return $this->_iPrioritySort;
    }//end of getPrioritySort() method
    
}//end of Club Class
