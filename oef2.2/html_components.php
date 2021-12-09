<?php
function PrintHead()
{
    print file_get_contents("templates/head.html");
}

function PrintBody( $class = "" )
{
    print "<body class='$class'>";
}

function PrintJumbo( $title, $subtitle )
{
    $new_jumbo = file_get_contents("templates/jumbo.html");
    $new_jumbo = str_replace( "@@TITLE@@", $title, $new_jumbo);
    $new_jumbo = str_replace( "@@SUBTITLE@@", $subtitle, $new_jumbo);

    print $new_jumbo;
}

function PrintEndOfPage()
{
    print "</body>";
    print "</html>";
}