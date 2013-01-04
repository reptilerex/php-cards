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
$sPath = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
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

// Make players
$oPlayerOne = new Player();
$oPlayerTwo = new Player();
$oPlayerThree = new Player();

// Deck of cards made by objects of cards
$oDeck = new Deck(
    $oAceClub, $oAceDiamond, $oAceHeart, $oAceSpade,
    $oTenClub, $oTenDiamond, $oTenHeart, $oTenSpade,
    $oNineClub, $oNineDiamond, $oNineHeart, $oNineSpade,
    $oJackClub, $oJackDiamond, $oJackHeart, $oJackSpade,
    $oQueenClub, $oQueenDiamond, $oQueenHeart, $oQueenSpade,
    $oKingClub, $oKingDiamond, $oKingHeart, $oKingSpade
);

// How many card we have in our deck
$iCardsInDeck = $oDeck->getCardsAmount();

// Shuffle it !
$oDeck->shuffle();

// Gave 8 cards to all players
$oDeck->dealCards(8, $oPlayerOne);
$oDeck->dealCards(8, $oPlayerTwo);
$oDeck->dealCards(8, $oPlayerThree);

// Sorting players cards
$oPlayerOne->sortCardsBySuits();
$oPlayerTwo->sortCardsByPoints();
$oPlayerThree->sortCardsBySuitsAndPoints();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>PHPCards Sorting Example</title>
        <style typ="text/css">
            body {
                background-color: #000000;
                text-align: center;
                margin-top: 50px;
                font-family: Verdana, Arial;
                color: #ffffff;
            }
            div#tablePool {
               background-color: green; 
               width: 800px;
               padding: 10px;
               margin: 0 auto;
               border: 2px solid #ffffff;
            }
        </style>
    </head>
    <body>
        <h1>PHPCards Example</h1>
        <div id="tablePool">
            There are 3 players, <?php echo $iCardsInDeck; ?> cards in deck, each of player took 8 cards.<br />
            
            <h2>Player 1 sorted his cards by suits</h2>
            <?php foreach ($oPlayerOne->getCards() as $oCard): ?>
                <?php $sCardName = (string)$oCard; ?>
                <img src="../Images/<?php echo $sCardName ?>.png" alt="<?php echo $sCardName ?>" />
            <?php endforeach; ?>

            <h2>Player 2 sorted his cards by points</h2>
            <?php foreach ($oPlayerTwo->getCards() as $oCard): ?>
                <?php $sCardName = (string)$oCard; ?>
                <img src="../Images/<?php echo $sCardName ?>.png" alt="<?php echo $sCardName ?>" />
            <?php endforeach; ?>
                
            <h2>Player 3 sorted his cards by suits and points</h2>
            <?php foreach ($oPlayerThree->getCards() as $oCard): ?>
                <?php $sCardName = (string)$oCard; ?>
                <img src="../Images/<?php echo $sCardName ?>.png" alt="<?php echo $sCardName ?>" />
            <?php endforeach; ?><br /><br />
                
            <input type="button" onclick="location.reload(true)" value="Shuffle !" />
        </div>
    </body>
</html>
