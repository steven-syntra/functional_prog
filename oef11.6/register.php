<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Registreer", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
            //toon messages als er zijn
            $container->getMessageService()->ShowErrors();
            $container->getMessageService()->ShowInfos();

            //get data
            if ( count($old_post) > 0 )
            {
                $data = [ 0 => [
                                             "usr_voornaam" => $old_post['usr_voornaam'],
                                             "usr_naam" => $old_post['usr_naam'],
                                             "usr_email" => $old_post['usr_email'],
                                             "usr_password" => $old_post['usr_password']
                                           ]
                              ];
            }
            else $data = [ 0 => [ "usr_voornaam" => "", "usr_naam" => "", "usr_email" => "", "usr_password" => "" ]];

            //get template
            $output = file_get_contents("templates/register.html");

            //add extra elements
            $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

            //merge
            $field_specific_errors = $container->getMessageService()->GetInputErrors();

            $output = MergeViewWithData( $output, $data );
            $output = MergeViewWithExtraElements( $output, $extra_elements );
            if ( isset($errors) ) $output = MergeViewWithErrors( $output, $field_specific_errors );
            $output = RemoveEmptyErrorTags( $output, $data );

            print $output;
        ?>

    </div>
</div>

</body>
</html>