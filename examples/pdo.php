<h1>PDO Example</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid19";

// Create and check connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//define and execute query
$sql = "select * from gemeente";
$result = $conn->query($sql);

print "<table>";

//show result (if there is any)
if ( $result->rowCount() > 0 )
{
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    // output data of each row
    foreach ($rows as $row)
    {
        print "<tr>";
        print "<td>" .  $row["det_id"] . "</td>";
        print "<td>" .  $row["det_niscode"] . "</td>";
        print "<td>" .  $row["det_prv_id"] . "</td>";
        print "<td>" .  $row["det_txt_nl"] . "</td>";
        print "<td>" .  $row["det_txt_fr"] . "</td>";
        print "<td>" .  $row["det_cases"] . "</td>";
        print "</tr>";
    }
}
else
{
    echo "No records found";
}

print "</table>";

$conn->close();
?>
