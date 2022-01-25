<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
require_once "cls.Week.php";

PrintHead();
PrintJumbo( $title = "Weekoverzicht OOP" ,
                        $subtitle = "" );
PrintNavbar();
PrintBody();
?>

<div class="container">
    <div class="row">

<?php
    $week = new Week();
    print $week->Generate();

//print "<br>";
//
//print $week->getMaandagThiswStr();
//print "<br>";
//print $week->getZondagThiswStr();
?>

    </div>
</div>

</body>
</html>