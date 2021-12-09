<?php
function PrintHead()
{
    print file_get_contents("templates/head.html");
}

function PrintBody()
{
    print "<body>";
}

function PrintJumbo( $title, $subtitle )
{
    $new_jumbo = file_get_contents("templates/jumbo.html");
    $new_jumbo = str_replace( "@@TITLE@@", $title, $new_jumbo);
    $new_jumbo = str_replace( "@@SUBTITLE@@", $subtitle, $new_jumbo);

    print $new_jumbo;
}