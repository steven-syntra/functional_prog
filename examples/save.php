<?php
session_start();

require_once "database.php";

print "Dit is save.php<br>";

print "whatever heeft nu de waarde " . $_SESSION["whatever"] . "<br>";
print "De in de sessie opgeslagen token is deze: " . $_SESSION["latest_csrf"] . "<br>" ;

print '-----------DIT IS $_POST----------<br>';
var_dump($_POST);
print '---------------------------------------<br>';

if ( ! hash_equals( $_POST['csrf'], $_SESSION['latest_csrf'] ) )
{
    header( "Location: no_access.php");
    die();
}
else
{
    print "CRSF is OK!!!!<br>";
}



$table_name = $_POST["tabel"];

$sql = "SHOW FULL COLUMNS FROM $table_name";
$rows = GetData($sql);

$fields_values = [];
foreach ( $rows as $row )
{
    print $row["Field"] . "<br>";

    if ( $row["Key"] == "PRI" )
    {
        print $row["Field"] . " is de primary key en die negeren we!<br>";
        continue;
    }

    if ( key_exists( $row["Field"], $_POST ))
    {
        $fields_values[] = $row["Field"] . "=" . "'" . htmlentities( trim($_POST[$row["Field"]]), ENT_QUOTES ) . "'"  ;
    }
}

print implode(", " , $fields_values) . "<br>";

$sql = "INSERT INTO $table_name SET " . implode(", " , $fields_values) ;

print $sql . "<br>";

$result = ExecSQL($sql);

var_dump($result); print "<br>";

//header( "Location: " . $_POST["pagetogoto"]);
?>
