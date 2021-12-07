<h1>MySQLi Prepared Statement Example</h1>

<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "config.php";

// Create connection
//global $servername, $username, $password, $dbname; //eigenlijk overbodig, enkel voor PHPStorm

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//validate GET argument
if ( ! is_numeric($_GET['id']))
{
    die("Wrong parameter");
}

//prepare statement
$sql = "SELECT * FROM image WHERE img_id=?";
$stmt = $conn->prepare($sql);

if ( $stmt == false ){
    die("Error preparing statement " . $sql);
}

//bind parameters
$stmt->bind_param("i", $_GET["id"]);    //$_GET['id'] must be convertable to int ("i")
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

//show result (if there is any)
if ( $stmt->affected_rows > 0 )
{
    // output data of each row
    while( $row = $result->fetch_assoc() )
    {
        echo $row["img_id"] . "<br>";
        echo $row["img_title"] . "<br>";
        echo $row["img_filename"] . "<br>";
        echo $row["img_width"] . "<br>";
        echo $row["img_height"] . "<br>";
        echo "<br>";
    }
}
else
{
    echo "No records found";
}

$conn->close();
?>
