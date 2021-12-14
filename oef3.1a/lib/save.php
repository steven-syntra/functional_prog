<?php
require_once "database.php";

$sql = "UPDATE image SET " .
            " img_filename=" . "'" . $_POST["img_filename"] . "'," .
            " img_title=" . "'" . $_POST["img_title"] . "'," .
            " img_width=" . "'" . $_POST["img_width"] . "'," .
            " img_height=" . "'" . $_POST["img_height"] . "'" .
            " WHERE img_id=" . $_POST["img_id"];

ExecSQL($sql);

header("Location: ../steden2.php");
