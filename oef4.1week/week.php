<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Weekoverzicht" ,
                        $subtitle = "" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

<?php
    $vandaag = new DateTime('2022-01-20', new DateTimeZone("Europe/Brussels"));
    $weekdag_nr = $vandaag->format('N'); // bv. 4 = donderdag, ..., 7=zondag
    $verschil_volgende_maandag = 8 - $weekdag_nr ;

    $maandag_nextw = $vandaag->add( new DateInterval( "P" . $verschil_volgende_maandag . "D" ));
    $maandag_thisw = $vandaag->sub( new DateInterval( "P7D" ));
    $maandag_thisw_str = $maandag_thisw->format("Y-m-d");

    $zondag_thisw = $vandaag->add( new DateInterval( "P6D" ));
    $zondag_thisw_str = $zondag_thisw->format("Y-m-d");

    // loop over all 7 days of next week
    $output = "<table class='table week'>";

    $loop_date = new DateTime( $maandag_thisw_str, new DateTimeZone("Europe/Brussels"));
    for ( $x = 1 ; $x <= 7; $x++ )
    {
        //get data for 1 day
        $sql = " select * from taak " .
                    " WHERE taa_datum = " . "'" .  $loop_date->format("Y-m-d") . "'" .
                    " ORDER BY taa_start ";
        $data = GetData( $sql );

        //begin rij
        $output .= "<tr>";

        //weekdag cel
        $output .= "<td>" . $loop_date->format("l") . "</td>";

        //datum cel
        $output .= "<td>" . $loop_date->format("d/m/Y") . "</td>";

        //taken cel
        $output .= "<td>";

        foreach( $data as $row ) {
            $start = substr( $row['taa_start'], 0, 5 );
            $end = substr( $row['taa_end'], 0, 5 );
            $output .= "$start-$end &nbsp;&nbsp;&nbsp;" . $row['taa_omschr'] . "<br>";
        }

        $output .= "</td>";

        // einde rij
        $output .= "</tr>";

        $loop_date->add( new DateInterval( "P1D" ));
    }

    $output .= "</table>";

    print $output;

?>

    </div>
</div>

</body>
</html>