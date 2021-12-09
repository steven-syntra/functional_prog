<?php
require_once "html_components.php";

PrintHead();
PrintBody();
PrintJumbo( $title = "Detail van een stad (stad.php)", $subtitle = "");
?>

<div class="container">
    <div class="row">

        <?php
        //we need data from the database, so...
        require_once "database.php";

        $rows = GetData( "select * from image where img_id=" . $_GET["img_id"] );

        //hoewel er maar 1 rij is, kunnen we hier ook een foreach gebruiken...
        foreach ( $rows as $row )
        {
            //de kolom met de titel en de afbeelding erin
            print '<div class="col-sm-12">';

                //title, filename, pixels
                print '<h3>' . $row['img_title'] . '</h3>';
                print '<p>filename: ' .  $row['img_filename'] . '</p>';
                print '<p>' .  $row['img_width'] . " x " . $row['img_height'] . ' pixels</p>';

                //afbeelding
                $link_image = "../images/" . $row['img_filename'];
                print '<img class="img-fluid" style="width: 75%;" src="' . $link_image . '">';

                //hyperlink
                print '<p></p>';
                print '<p><a href=steden2.php>Terug naar overzicht</a></p>';

            print '</div>' ;
        }

        ?>

    </div>
</div>

</body>
</html>