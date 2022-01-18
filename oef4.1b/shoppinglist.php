<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
require_once "models/ShoppingList.php";

PrintHead();
PrintJumbo( $title = "We gaan shoppen!" );
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <?php

        # $sl is een objectvariable, maar ook een instance van de class ShoppingList
        $sl = new ShoppingList( $shop = "Carrefour",
                                                $date = new DateTime( "2021-01-31" ),
                                                $items =  [ "sokken", "onderbroeken", "muts" ]);

        $sl->setShop("Delhaize")
            ->setDate( new DateTime( "2021-12-31" ));

//        $sl->setDate( new DateTime( "2021-01-31" ));
//        $sl->setItems( ) ;

        print "<p>Waar? " . $sl->getShop() . "</p>";
        //print "<p>Wanneer? " . $sl->getDate() . "</p>";
        print "<p>Wanneer? " . $sl->getDateString() . "</p>";
        print "<p>Welke dag is dat? " . $sl->getDate()->format("l") . "</p>";

        print "<p>Wat gaan we kopen? </p>";

        print "<ul>";

        $sl->empty()
            ->setItems( [ "bloemkool", "brocoli", "thym"  ] );

        foreach( $sl->getItems() as $item  )
        {
            print "<li>" . $item . "</li>";
        }

        print "</ul>";

        $alltheprops = $sl->getAllTheProperties();
        var_dump($alltheprops);

        ?>
        </div>
    </div>
</div>

</body>
</html>