<?php
include_once('./Interfaces/CardInterface.php');
include_once('./Interfaces/SuitInterface.php');
include_once('./Exceptions/PHPCardsException.php');
include_once('./Deck.php');
include_once('./Cards/Ace.php');
include_once('./Cards/King.php');
include_once('./Suits/Heart.php');
include_once('./Suits/Diamond.php');
include_once('./Suits/Club.php');
include_once('./Suits/Spade.php');

// Aces
$oAceHeart = new PHPCards\Cards\Ace();
$oAceHeart->setSuit(new PHPCards\Suits\Heart());

$oAceDiamond = new PHPCards\Cards\Ace();
$oAceDiamond->setSuit(new PHPCards\Suits\Diamond());

$oAceClub = new PHPCards\Cards\Ace();
$oAceClub->setSuit(new PHPCards\Suits\Club());

$oAceSpade = new PHPCards\Cards\Ace();
$oAceSpade->setSuit(new PHPCards\Suits\Spade());

// Kings
$oKingHeart = new PHPCards\Cards\King();
$oKingHeart->setSuit(new PHPCards\Suits\Heart());

$oKingDiamond = new PHPCards\Cards\King();
$oKingDiamond->setSuit(new PHPCards\Suits\Diamond());

$oKingClub = new PHPCards\Cards\King();
$oKingClub->setSuit(new PHPCards\Suits\Club());

$oKingSpade = new PHPCards\Cards\King();
$oKingSpade->setSuit(new PHPCards\Suits\Spade());

$oDeck = new PHPCards\Deck(
	$oAceClub, $oAceDiamond, $oAceHeart, $oAceSpade,
	$oKingClub, $oKingDiamond, $oKingHeart, $oKingSpade
);


$oDeck->shuffle();

var_dump($oDeck->getCardsAmount());

?>
