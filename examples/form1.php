<?php
//record uit databank halen
require_once "select.php";
require_once "security.php";

$_SESSION["whatever"] = "pompompom";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Honden</title>
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
    <h1>De leukste honden van Europa</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
    <div class="row">

    <form action="save.php" method="post" style="width: 80%;">

        <input type="hidden" name="tabel" value="hond">
        <input type="hidden" name="csrf" value="<?= GenerateCSRF( "form1.php"  ) ?>">
        <input type="hidden" name="pagetogoto" value="boot.php">

        <div class="form-group">
            <label for="hon_id">Id</label>
            <input readonly type="number" class="form-control" id="hon_id" name="hon_id">
        </div>

        <div class="form-group">
            <label for="hon_merk">Merk</label>
            <input type="text" class="form-control" id="hon_merk" name="hon_merk" placeholder="Bv. Labrador, Jack Russel, ...">
        </div>

        <div class="form-group">
            <label for="hon_naam">Naam</label>
            <input type="text" class="form-control" id="hon_naam" name="hon_naam">
        </div>

        <div class="form-group">
            <label for="hon_geboortedatum">Geboortedatum</label>
            <input type="date" class="form-control" id="hon_geboortedatum" name="hon_geboortedatum" value="<?=hon_geboortedatum?>">
        </div>

        <div class="form-group">
            <label for="hon_poten">Aantal poten</label>
            <input type="number" class="form-control" id="hon_poten" name="hon_poten" value="4">
        </div>

        <div class="form-group">
            <label for="hon_land">Land</label>
            <?php //print MakeSelectLand(); ?>
            <?php print MakeSelect( $fieldname = "img_lan_id",
                                                        $sql = "select * from land",
                                                        $list_fields = ["lan_id", "lan_land"] );
            ?>

            <?php print MakeSelect( $fieldname = "img_aan_id",
                $sql = "select * from aanspreking",
                $list_fields = ["aan_id", "aan_aanspreking"] );
            ?>

        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="img_published" name="img_published" checked>
            <label class="form-check-label" for="img_published">
                Published
            </label>
        </div>

        <button type="submit" class="btn btn-primary" id="btnVerzenden" name="btnVerzenden">Verzenden</button>
        <button type="submit" class="btn btn-primary" id="btnCancel" name="btnCancel">Annuleren</button>

    </form>

    </div>
</div>

</body>
</html>

