<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
//PrintMessages();
?>

<div class="container">
    <div class="row">

<?php
//    testje foutmelding
//    $_SESSION["errors"][] = "Geen fouten!";

    $steven = "Steven";
    $container->getLogger()->Log("DIT BERICHT KOMT UIT STEDEN.PHP");
    $container->getLogger()->Log( "De variabele steven: " . var_export($steven, true));


    //toon messages als er zijn
    $container->getMessageService()->ShowErrors();
    $container->getMessageService()->ShowInfos();

    //get data
    $data = $container->getDBManager()->GetData( "select * from image" );

    //get template
    $template = file_get_contents("templates/column.html");

    //merge
    $output = MergeViewWithData( $template, $data );
    print $output;
?>

    </div>
</div>

</body>
</html>