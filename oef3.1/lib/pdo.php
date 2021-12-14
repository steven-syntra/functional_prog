<?php
require_once "connection_data.php";

function CreateConnection()
{
    global $conn;
    global $servername, $dbname, $username, $password;

    // Create and check connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function GetData( $sql )
{
    global $conn;

    CreateConnection();

    //define and execute query
    $result = $conn->query( $sql );

    //show result (if there is any)
    if ( $result->rowCount() > 0 )
    {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    else
    {
        return [];
    }

}

function ExecuteSQL( $sql )
{
    global $conn;

    CreateConnection();

    //define and execute query
    $result = $conn->query( $sql );

    return $result;
}
