<?php
//we need data from the database, so...
require_once "lib/database.php";
require_once "lib/html_components.php";

//data ophalen uit de databank
$sql = "select * from image where img_id = " . $_GET["img_id"];
$rows = GetData( $sql );
$row = $rows[0];

//output genereren
PrintHead();
PrintBody();
PrintJumbo( $title = "Detail Stad",
                        $subtitle = "Je kan deze pagina resizen om het responsive karakter in werking te zien");
?>

<div class="container">
    <div class="row">


<form id="mainform" name="mainform" method="POST" action="lib/save.php">

    <div class="form-group row">
        <label for="img_id" class="col-sm-4 col-form-label">Id</label>
        <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="img_id" name="img_id" value="<?= $row["img_id"] ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="img_title" class="col-sm-4 col-form-label">Title</label>
        <div class="col-sm-8">
            <input type="text" class="form-control-plaintext" id="img_title" name="img_title" value="<?= $row["img_title"] ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="img_filename" class="col-sm-4 col-form-label">Filename</label>
        <div class="col-sm-8">
            <input type="text" class="form-control-plaintext" id="img_filename" name="img_filename" value="<?= $row["img_filename"] ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="img_width" class="col-sm-4 col-form-label">Width</label>
        <div class="col-sm-8">
            <input type="text" class="form-control-plaintext" id="img_width" name="img_width" value="<?= $row["img_width"] ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="img_height" class="col-sm-4 col-form-label">Height</label>
        <div class="col-sm-8">
            <input type="text" class="form-control-plaintext" id="img_height" name="img_height" value="<?= $row["img_height"] ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="img_height" class="col-sm-4 col-form-label"></label>
        <div class="col-sm-8">
            <input type="submit" id="btnSave" name="btnSave" value="Verzenden">
        </div>
    </div>

</form>

    </div>
</div>
</body>
</html>