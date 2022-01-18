<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

<?php
    //get data
    $data = GetData( "select * from klanten" );

    $data = [ 0 => [ "kla_naam" => "De Ryck", "kla_id" => 23, ...],
                     0 => [ "kla_naam" => "De Ryck", "kla_id" => 23, ...]
    ];


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