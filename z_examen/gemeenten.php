<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Besmettingen per gemeente" ,
                        $subtitle = "Cijfers van 17 november 2021" );
PrintNavbar();
?>

<div class="container">
    <div class="row">



    <div class="col-sm-12">
        <?php
        // als er een zoekterm opgegeven is, vervangen we die ook in het formulier (blijft dus staan na het verzenden
        // van het formulier)
        $zoek_value = "";
        if ( key_exists( "zoek_text", $_GET ) AND $_GET["zoek_text"] > "" ) $zoek_value = $_GET["zoek_text"];

        $template = file_get_contents("templates/gemeenten_zoek_form.html");
        $out_form = MergeViewWithData( $template, [ [ 'zoek_value' => $zoek_value ] ]  );
        print $out_form;
        ?>
    </div>

    <div class="col-sm-12">
        <?php
        //get data
        $sql = "select * from gemeente";

        if ( key_exists( "zoek_text", $_GET ) AND $_GET["zoek_text"] > "" )
        {
            $sql .= " WHERE det_txt_nl LIKE '%" . $_GET["zoek_text"] . "%'" ;
        }

        $data = GetData( $sql );

        $table = "<table class='zoek_resultaat'>";

        //get row template
        $template = file_get_contents("templates/table_row_gemeenten.html");
        $table .= MergeViewWithData( $template, $data );

        $table .= "</table>";

        print $table;
        ?>
    </div>

    </div>
</div>

</body>
</html>