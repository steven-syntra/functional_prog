<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Login", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
            //get data
            $data = [ 0 => [ "usr_email" => "", "usr_password" => "" ]];

            //get template
            $output = file_get_contents("templates/login.html");

            //add extra elements
            $extra_elements['csrf_token'] = GenerateCSRF( "login.php"  );

            //merge
            $output = MergeViewWithData( $output, $data );
            $output = MergeViewWithExtraElements( $output, $extra_elements );
            //$output = MergeViewWithErrors( $output, $errors );
            //$output = RemoveEmptyErrorTags( $output, $data );

            print $output;
        ?>

    </div>
</div>

</body>
</html>