<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Profiel", $subtitle = "" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php
        //toon messages als er zijn
        $container->getMessageService()->ShowErrors();
        $container->getMessageService()->ShowInfos();

            //get data
            $data = $container->getDBManager()->GetData( "select * from user where usr_id=" . $_SESSION['user']->getId() );

            //get template
            $output = file_get_contents("templates/profiel.html");

            //add extra elements
            $extra_elements['csrf_token'] = GenerateCSRF( "profiel.php"  );

            //merge
            $output = MergeViewWithData( $output, $data );
            $output = MergeViewWithExtraElements( $output, $extra_elements );
            $output = MergeViewWithErrors( $output, $container->getMessageService()->GetInputErrors() );
            $output = RemoveEmptyErrorTags( $output, $data );

            print $output;
        ?>

    </div>
</div>

</body>
</html>