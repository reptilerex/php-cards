<?php
$fStart = microtime(true);

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


use PHPCards\Cards\Ace;
use PHPCards\Cards\Ten;
use PHPCards\Cards\King;
use PHPCards\Cards\Queen;
use PHPCards\Cards\Jack;
use PHPCards\Cards\Nine;
use PHPCards\Suits\Heart;
use PHPCards\Suits\Diamond;
use PHPCards\Suits\Club;
use PHPCards\Suits\Spade;
use PHPCards\Deck;
use PHPCards\Player;
use PHPCards\Table;
use PHPCards\Scores;

// Example of creating card objects (24 cards)
$oAceHeart = new Ace();     $oAceHeart->setSuit(new Heart());
$oAceDiamond = new Ace();   $oAceDiamond->setSuit(new Diamond());
$oAceSpade = new Ace();     $oAceSpade->setSuit(new Spade());
$oAceClub = new Ace();      $oAceClub->setSuit(new Club());

$oTenHeart = new Ten();     $oTenHeart->setSuit(new Heart());
$oTenDiamond = new Ten();   $oTenDiamond->setSuit(new Diamond());
$oTenSpade = new Ten();     $oTenSpade->setSuit(new Spade());
$oTenClub = new Ten();      $oTenClub->setSuit(new Club());

$oKingHeart = new King();     $oKingHeart->setSuit(new Heart());
$oKingDiamond = new King();   $oKingDiamond->setSuit(new Diamond());
$oKingSpade = new King();     $oKingSpade->setSuit(new Spade());
$oKingClub = new King();      $oKingClub->setSuit(new Club());

$oQueenHeart = new Queen();     $oQueenHeart->setSuit(new Heart());
$oQueenDiamond = new Queen();   $oQueenDiamond->setSuit(new Diamond());
$oQueenSpade = new Queen();     $oQueenSpade->setSuit(new Spade());
$oQueenClub = new Queen();      $oQueenClub->setSuit(new Club());

$oJackHeart = new Jack();     $oJackHeart->setSuit(new Heart());
$oJackDiamond = new Jack();   $oJackDiamond->setSuit(new Diamond());
$oJackSpade = new Jack();     $oJackSpade->setSuit(new Spade());
$oJackClub = new Jack();      $oJackClub->setSuit(new Club());

$oNineHeart = new Nine();     $oNineHeart->setSuit(new Heart());
$oNineDiamond = new Nine();   $oNineDiamond->setSuit(new Diamond());
$oNineSpade = new Nine();     $oNineSpade->setSuit(new Spade());
$oNineClub = new Nine();      $oNineClub->setSuit(new Club());

// Creating two players
$oPlayer1 = new Player();
$oPlayer2 = new Player();

// Creating table object
$oTable = new Table();

// Creating scores object to storing points and money
$oScores = new Scores();
$oMoney = new Scores();

// Creating deck using cards
$oDeck = new Deck(
    $oAceHeart, $oAceDiamond, $oAceClub, $oAceSpade,
    $oTenHeart, $oTenDiamond, $oTenClub, $oTenSpade,
    $oKingHeart, $oKingDiamond, $oKingClub, $oKingSpade,
    $oQueenHeart, $oQueenDiamond, $oQueenClub, $oQueenSpade,
    $oJackHeart, $oQueenDiamond, $oQueenClub, $oQueenSpade,
    $oNineHeart, $oNineDiamond, $oNineClub, $oNineSpade
);

// Shuffle our deck
$oDeck->shuffle();

// Give 12 card to each player
$oDeck->dealCards(12, $oPlayer1);
$oDeck->dealCards(12, $oPlayer2);

// Player1 put card on 5 position on table
$oPlayer1->putOnTable(5, $oTable);

$fMemory = round(memory_get_usage()/1024, 2);
$fEnd = microtime(true);
echo 'Took '.($fEnd-$fStart).' s and '.$fMemory.' KB of memory';