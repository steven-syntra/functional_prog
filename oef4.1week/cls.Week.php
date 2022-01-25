<?php

class Week
{
    private $opgegeven_datum ;
    private $maandag_thisw_str;
    private $zondag_thisw_str;

    public function __construct( )
    {
        if ( key_exists('datum', $_GET )) $this->opgegeven_datum = $_GET['datum'];
        else $this->opgegeven_datum = '';

        $this->FindWeekRange();
    }

    private function FindWeekRange()
    {
        // 1. bepaal de gevraagde datum (kan ook de huidige zijn)
        $vandaag = new DateTime( $this->opgegeven_datum, new DateTimeZone("Europe/Brussels"));

        // 2. bepaal het weekdagnummer van de huidige datum
        $weekdag_nr = $vandaag->format('N'); // bv. 4 = donderdag, ..., 7=zondag

        // 3. hoeveel dagen verder is volgende maandag?
        $verschil_volgende_maandag = 8 - $weekdag_nr ;

        // 4. bereken volgende maandag
        $maandag_nextw = $vandaag->add( new DateInterval( "P" . $verschil_volgende_maandag . "D" ));

        // 5. ga 7 dagen terug
        $maandag_thisw = $vandaag->sub( new DateInterval( "P7D" ));

        // 6. backup maken van vorige maandag als string (die wijzigt niet)
        $this->maandag_thisw_str = $maandag_thisw->format("Y-m-d");

        // 7. zondag van huidige week uitrekenen
        $zondag_thisw = $vandaag->add( new DateInterval( "P6D" ));

        // 8. backup maken van volgende zondag als string (die wijzigt niet)
        $this->zondag_thisw_str = $zondag_thisw->format("Y-m-d");
    }

    public function Generate(): string
    {
        // loop over all 7 days of next week
        $output = "<table class='table week'>";

        //nieuwe objectvariabele om de hele week te overlopen, beginnen op maandag
        $loop_date = new DateTime( $this->maandag_thisw_str, new DateTimeZone("Europe/Brussels"));
        for ( $x = 1 ; $x <= 7; $x++ )
        {
            $data = $this->getTasksFromDatabase( $loop_date->format("Y-m-d") );

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

        return $output;
    }

    private function getTasksFromDatabase( $datum ): array
    {
        //get data for 1 day
        $sql = " select * from taak WHERE taa_datum = " . "'" .  $datum . "'" . " ORDER BY taa_start ";
        $data = GetData( $sql );

        return $data;
    }

    /**
     * @return string
     */
    public function getMaandagThiswStr(): string
    {
        return $this->maandag_thisw_str;
    }

    /**
     * @return string
     */
    public function getZondagThiswStr(): string
    {
        return $this->zondag_thisw_str;
    }


}