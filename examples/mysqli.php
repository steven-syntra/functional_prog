<h1>MySQLi Example</h1>

<?php
require_once "config.php";

/*
if ( key_exists("naam", $_GET) ) print strtoupper( $_GET["naam"] );
print " ";
if ( key_exists("adres", $_GET) ) print strtoupper( $_GET["adres"] );
print " ";
if ( key_exists("gemeente", $_GET) ) print strtoupper( $_GET["gemeente"] );
*/

var_dump( $_GET ); print "<br>";

//require_once "string_functions.php";
//require_once "date_functions.php";
//require_once "business_logic_functions.php";
//require_once "database.php";

// Create connection
global $servername, $username, $password, $dbname; //eigenlijk overbodig, enkel voor PHPStorm

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//define and execute query
$sql = "select * from gemeente inner join provincie on det_prv_id = prv_id ";
if ( $_GET["gemeente"] > "" )
{
    $_GET["gemeente"] = str_replace( "'", "%", $_GET["gemeente"]);
    $sql .= " where det_txt_nl like '" . $_GET["gemeente"] . "%'" ;
    //$sql = $sql . " where det_txt_nl like 'Lier%'   ";
}
var_dump($sql); print "<br>";
print "<br>";

$result = $conn->query($sql);

print "<table>";

//show result (if there is any)
if ( $result->num_rows > 0 )
{
    // output data of each row
    $aantal = 0;
    while( $row = $result->fetch_assoc() )
    {
        $aantal++;

        //if ( $aantal > 10 ) break;

//        if ( strtoupper($row['det_txt_nl']) == strtoupper($_GET["gemeente"]) )
//        {
            echo "<tr>";
            print "<td>" . $row["det_id"] . "</td>";
            print "<td>" . $row["det_niscode"] . "</td>";
            print "<td>" . $row["prv_naam"] . "</td>";
            print "<td>" . $row["det_txt_nl"] . "</td>";
            print "<td>" . $row["det_txt_fr"] . "</td>";
            print "<td>" . $row["det_cases"] . "</td>";

            if ( $row["det_image"] > "" ) {
                $afbeeldingslink = "<img src=" . $row["det_image"] . " />";
            }
            else {
                $afbeeldingslink = null;
            }

            print "<td>$afbeeldingslink</td>";

            //hyperlink
            print '<td><a href="https://www.' . $row["det_txt_nl"]  . '.be">Link naar website</a></td>';

            print "</tr>";
//        }


        //var_dump($row); print "<br>";

    }
}
else
{
    echo "No records found";
}

print "</table>";

$conn->close();
?>
