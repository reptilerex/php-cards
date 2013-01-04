<?php
/**
 * Function phpCardsAutoloader();
 * 
 * Function is simple autoloader which is
 * registered by spl_autoload_register, it
 * is very simple to make a work easier
 * it is earsing PHPCards from classname
 * and replace "\" to directory separator
 * PHPCards are PSR-0 friendly so it is
 * very simple to implement
 * 
 * @param   string  $sClass Class to load
 * @return  void
 */
function phpCardsAutoloader($sClass)
{
    $sBase = dirname(__FILE__).DIRECTORY_SEPARATOR;
    $aSearch = array('PHPCards\\', '\\');
    $aReplace = array('', DIRECTORY_SEPARATOR);
    
    $sPath = str_replace($aSearch, $aReplace, $sClass).'.php';
    include_once($sBase.$sPath);
}//end of phpCardsAutoloader() function

// Registering
spl_autoload_register('phpCardsAutoloader');
