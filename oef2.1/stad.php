<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Stad</title>
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
    <h1>Detail Stad</h1>
</div>

<div class="container">
    <div class="row">

        <?php
        //we need data from the database, so...
        require_once "database.php";

        $rows = GetData( "select * from image where img_id=" . $_GET["img_id"] );
        $row = $rows[0];

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
        ?>

    </div>
</div>

</body>
</html>