<?php
date_default_timezone_set("Europe/Brussels");
setlocale(LC_TIME, 'nl_NL');

$nu = time();
var_dump($nu); print "<br>";

// gewone variabelen worden doorgegeven BY VALUE (PASS BY VALUE)
$copy_nu = $nu;
var_dump($copy_nu); print "<br>";

$nu = mktime( 0, 0, 0, 12, 31, 1990);

var_dump($nu); print "<br>";
var_dump($copy_nu); print "<br>";


$dedatum = date( "d/m/Y H:i:s", $nu  );
print "$dedatum<br>";

$dedatum_mysql = date( "Y-m-d", $nu  );
print "$dedatum_mysql<br>";

$verjaardag = mktime( 0, 0, 0, 7, 23, 2021);
print "$verjaardag seconden na 1/1/1970<br>";

$datum_verjaardag = date( "d/m/Y", $verjaardag  );
print "$datum_verjaardag<br>";

$eenweeklater = mktime( 0, 0, 0, 7, 23 + 7, 2021);
$eenweeklater_datum = date( "d/m/Y", $eenweeklater  );
print "een week later is $eenweeklater_datum<br>";

$eenmaandlater = mktime( 0, 0, 0, 7 + 1, 23, 2021);
$eenmaandlater_datum = date( "d/m/Y", $eenmaandlater  );
print "een maand later is $eenmaandlater_datum<br>";

$veertien_later = mktime( 0, 0, 0, 7, 23 + 14, 2021);
$veertien_later_datum = date( "d/m/Y", $veertien_later  );
print "een maand later is $veertien_later_datum<br>";

$laatste_vorige_maand = mktime( 0, 0, 0, 7, 0, 2021);
$laatste_vorige_maand_datum = date( "d/m/Y", $laatste_vorige_maand  );
print "laatste dag vorige maand: $laatste_vorige_maand_datum<br>";

$laatste_vorige_maand = mktime( 0, 0, 0, 3, 0, 2020);
$laatste_vorige_maand_datum = date( "d/m/Y", $laatste_vorige_maand  );
print "laatste dag vorige maand: $laatste_vorige_maand_datum<br>";

$mydate = getdate($laatste_vorige_maand);
var_dump($mydate);

$strdate = date("l d/m/Y H:i:s", $veertien_later);
print "veertien dagen later was $strdate<br>";

print "========================<br>";
echo strtotime("now"), "<br>";
echo strtotime("10 September 2000"), "<br>";
echo strtotime("+1 day"), "<br>";
echo strtotime("+1 week"), "<br>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
echo strtotime("next Thursday"), "<br>";
echo strtotime("last Monday"), "<br>";
print "========================<br>";


$d = new DateTime( 'NOW', new DateTimeZone('Europe/Brussels') );
print $d->format('Y-m-d H:i:s') . "<br>";

// OPGELET: objects are passed by reference !!!
$b = $d;

//3 maanden verder
$d->add( new DateInterval('P3M'));
print $d->format('Y-m-d H:i:s') . "<br>";

//1 dag terug
$d->sub( new DateInterval('P1D'));
print $d->format('Y-m-d H:i:s') . "<br>";

//laatste dag vd maand
$d->modify('last day of this month');
echo $d->format('Y-m-d H:i:s') . "<br>";

$vandaag = new DateTime( 'NOW', new DateTimeZone('Europe/Brussels') );
$vandaag->modify('last day of this month');
echo $vandaag->format('Y-m-d H:i:s') . "<br>";

print "Vandaag is het " . $b->format('Y-m-d H:i:s') . "<br>";


/*
 * mktime(
    int $hour,
    ?int $minute = null,
    ?int $second = null,
    ?int $month = null,
    ?int $day = null,
    ?int $year = null
): int|false
 */