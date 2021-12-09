<?php
require_once( $_SERVER["DOCUMENT_ROOT"] . "/functional_prog/testmap/config.php" );

//var_dump($_SERVER["DOCUMENT_ROOT"]);

function GetData( $sql )
{
    // create connection
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // execute given query
    $result = $conn->query($sql);

    // build data array
    $data = [];
    if ( $result->num_rows > 0 )
    {
        while( $row = $result->fetch_assoc() )
        {
            $data[] = $row;
        }
    }

    // close connection
    $conn->close();

    // return data array
    return $data;
}

function ExecSQL( $sql )
{
    // create connection
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // execute given query
    $result = $conn->query($sql);

    // close connection
    $conn->close();

    // return data array
    return $result;
}
