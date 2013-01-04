<?php
/**
 * Using namespaces
 */
use PHPCards\Cards\Ace;
use PHPCards\Cards\Ten;
use PHPCards\Cards\Nine;
use PHPCards\Cards\King;
use PHPCards\Cards\Queen;
use PHPCards\Cards\Jack;
use PHPCards\Suits\Heart;
use PHPCards\Suits\Diamond;
use PHPCards\Suits\Spade;
use PHPCards\Suits\Club;
use PHPCards\Player;
use PHPCards\Deck;

// Autoloading
$sPath = dirname(__FILE__).DIRECTORY_SEPARATOR;
include_once($sPath.'autoload.php');

// Aces
$oAceHeart = new Ace();     $oAceHeart->setSuit(new Heart());
$oAceDiamond = new Ace();   $oAceDiamond->setSuit(new Diamond());
$oAceSpade = new Ace();     $oAceSpade->setSuit(new Spade());
$oAceClub = new Ace();      $oAceClub->setSuit(new Club());

// Tens
$oTenHeart = new Ten();     $oTenHeart->setSuit(new Heart());
$oTenDiamond = new Ten();   $oTenDiamond->setSuit(new Diamond());
$oTenSpade = new Ten();     $oTenSpade->setSuit(new Spade());
$oTenClub = new Ten();      $oTenClub->setSuit(new Club());

// Nines
$oNineHeart = new Nine();       $oNineHeart->setSuit(new Heart());
$oNineDiamond = new Nine();     $oNineDiamond->setSuit(new Diamond());
$oNineSpade = new Nine();       $oNineSpade->setSuit(new Spade());
$oNineClub = new Nine();        $oNineClub->setSuit(new Club());

// Jacks
$oJackHeart = new Jack();       $oJackHeart->setSuit(new Heart());
$oJackDiamond = new Jack();     $oJackDiamond->setSuit(new Diamond());
$oJackSpade = new Jack();       $oJackSpade->setSuit(new Spade());
$oJackClub = new Jack();        $oJackClub->setSuit(new Club());

// Queens
$oQueenHeart = new Queen();     $oQueenHeart->setSuit(new Heart());
$oQueenDiamond = new Queen();   $oQueenDiamond->setSuit(new Diamond());
$oQueenSpade = new Queen();     $oQueenSpade->setSuit(new Spade());
$oQueenClub = new Queen();      $oQueenClub->setSuit(new Club());

// Kings
$oKingHeart = new King();       $oKingHeart->setSuit(new Heart());
$oKingDiamond = new King();     $oKingDiamond->setSuit(new Diamond());
$oKingSpade = new King();       $oKingSpade->setSuit(new Spade());
$oKingClub = new King();        $oKingClub->setSuit(new Club());


// Make two players
$oPlayerOne = new Player();
$oPlayerTwo = new Player();

// Deck of cards made by objects of cards
$oDeck = new Deck(
    $oAceClub, $oAceDiamond, $oAceHeart, $oAceSpade,
    $oTenClub, $oTenDiamond, $oTenHeart, $oTenSpade,
    $oNineClub, $oNineDiamond, $oNineHeart, $oNineSpade,
    $oJackClub, $oJackDiamond, $oJackHeart, $oJackSpade,
    $oQueenClub, $oQueenDiamond, $oQueenHeart, $oQueenSpade,
    $oKingClub, $oKingDiamond, $oKingHeart, $oKingSpade
);

// Shuffle it !
$oDeck->shuffle();

// Gave 7 cards to both players
$oDeck->dealCards(7, $oPlayerOne);
$oDeck->dealCards(7, $oPlayerTwo);

// Sorting player cards by suits and points
$oPlayerOne->sortCardsBySuitsAndPoints();

echo "Cards of Player One: \n\n";
print_r($oPlayerOne->getCards());

echo "\n\n Cards of Player Two: \n\n";
print_r($oPlayerTwo->getCards());

$fUsedMemory = round(memory_get_usage()/1024, 2);
echo "\n\n Memory used: $fUsedMemory KB\n";
