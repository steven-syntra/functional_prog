<?php
$studenten = [
    [
        "voornaam" => "Jan",
        "naam" => "Janssens",
        "straat" => "Oude baan",
        "huisnr" => "22",
        "postcode" => 2800,
        "gemeente" => "Mechelen",
        "geboortedatum" => "14/05/1991",
        "telefoon" => "015 24 24 26",
        "e-mail" => "jan.janssens@gmail.com"
    ],
    [
        "voornaam" => "Piet",
        "naam" => "Peeters",
        "straat" => "Molenlei",
        "huisnr" => "3",
        "postcode" => 2100,
        "gemeente" => "Deurne",
        "geboortedatum" => "7/7/1992",
        "telefoon" => "03 14 15 78",
        "e-mail" => "piet.peeters@microsoft.com"
    ],
    [
        "voornaam" => "Mieke",
        "naam" => "Verlinden",
        "straat" => "Lentelei",
        "huisnr" => "18B",
        "postcode" => 2640,
        "gemeente" => "Mortsel",
        "geboortedatum" => "28/7/1993",
        "telefoon" => "03 99 65 44",
        "e-mail" => "mieke_verlinden@bol.com"
    ]
];

foreach ($studenten as $student)
{
    print "<h1>Student</h1>";

    print "<table>";

    foreach ($student as $key => $value)
    {
        print "<tr><td>" . ucfirst($key) . "</td><td>" . $value . "</td></tr>\n";
    }
    print "</table>";
}