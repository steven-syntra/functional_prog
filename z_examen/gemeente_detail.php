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
        if ( ! is_numeric( $_GET['det_id']) ) die("Ongeldig argument " . $_GET['det_id'] . " opgegeven");

        //get data
        $sql = "select * from gemeente WHERE det_id=" . $_GET["det_id"] ;
        $data = GetData( $sql );
        $row = $data[0]; //there's only 1 row in data

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "gemeente_detail.php"  );
        $extra_elements['select_provincie'] = MakeSelect( $fkey = 'det_prv_id',
            $value = $row['det_prv_id'] ,
            $sql = "select prv_id, prv_naam from provincie" );


        //get template
        $output = file_get_contents("templates/gemeente_form.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $errors );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        ?>
    </div>

    </div>
</div>

</body>
</html>