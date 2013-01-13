<?php
/**
 * Function phpCardsAutoloader();
 * 
 * Function is simple autoloader which is
 * registered by spl_autoload_register, it
 * is very simple to make a work easier
 * it is replaceing "\" to actual directory 
 * separator PHPCards are PSR-0 friendly so 
 * it is very simple to implement
 * 
 * @param   string  $sClass Class to load
 * @return  void
 */
function phpCardsAutoloader($sClass)
{
    $sBase = dirname(__FILE__).DIRECTORY_SEPARATOR;
    $sPath = str_replace('\\', DIRECTORY_SEPARATOR, $sClass).'.php';
    include_once($sBase.$sPath);
}//end of phpCardsAutoloader() function

// Registering
spl_autoload_register('phpCardsAutoloader');
