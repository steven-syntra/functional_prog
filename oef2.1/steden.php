<!DOCTYPE html>
<html lang="en">
<head>
    <title>De leukste plekken in Europa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

</head>
<body>

<div class="jumbotron text-center">
    <h1>De leukste plekken in Europa</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
    <div class="row">

        <?php
        //we need data from the database, so...
        require_once "database.php";

        $rows = GetData( "select * from image" );

        //loop over de afbeeldingen
        foreach ( $rows as $row )
        {
            //de kolom met de titel en de afbeelding erin
            print '<div class="col-sm-4">';
            print '<h3>' . $row['img_title'] . '</h3>';
            print '<p>' .  $row['img_width'] . " x " . $row['img_height'] . ' pixels</p>';
            print '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>';

            $link_image = "../images/" . $row['img_filename'];
            print '<img class="img-fluid" src="' . $link_image . '">';

            print '</div>' ;
        }
        ?>

    </div>
</div>

</body>
</html>