<h1>MySQLi Example</h1>

<?php
require_once "config.php";
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
$sql = "select * from gemeente inner join provincie on det_prv_id = prv_id";
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

        if ( $aantal > 10 ) break;

        //var_dump($row); print "<br>";
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

        print "</tr>";
    }
}
else
{
    echo "No records found";
}

print "</table>";

HaliHalo();

$conn->close();
?>
