<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo();
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php
        //toon messages als er zijn
        $container->getMessageService()->ShowErrors();
        $container->getMessageService()->ShowInfos();

        if ( ! isset( $_GET['img_id']) ) die("Geen img_id opgegeven");
        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $rows = $container->getDBManager()->GetData( "select * from image where img_id=" . $_GET['img_id'] );

        if ( $rows )
        {
            $row = $rows[0];

            //data to object
            $city = new City();
            $city->setId( $row['img_id'] );
            $city->setFilename( $row['img_filename'] );
            $city->setTitle( $row['img_title'] );
            $city->setWidth( $row['img_width'] );
            $city->setHeight( $row['img_height'] );
            $city->setLanId( $row['img_lan_id'] );
            $city->setDate( $row['img_date'] );

            //get template
            $template = file_get_contents("templates/column_full.html");

            //merge
            $output = $template;

            //object to array
            $properties = $city->toArray2();
            $properties['title'] = $city->getTitle();

            foreach( $properties as $key => $value )
            {
                if ( $value )
                {
                    $output = str_replace( "@img_$key@", $value, $output );
                }
            }

            //output
            print $output;
        }

        ?>

    </div>
</div>

</body>
</html>