<?php
session_start();

require_once "pdo.php";
require_once "validation.php";

SaveFormData();

function SaveFormData()
{
    //var_dump($_SERVER); die();

    if ( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        if ( ! hash_equals( $_POST['csrf'], $_SESSION['latest_csrf'] ) )
        {
            die("Probleem met CSRF token!");
        }

        //var_dump($_POST);
        $table = $pkey = $update = $insert = $where = $str_keys_values = "";

        if ( ! key_exists("table", $_POST)) die("Missing table");
        if ( ! key_exists("pkey", $_POST)) die("Missing pkey");

        $table = $_POST['table'];
        $pkey = $_POST['pkey'];

        //insert or update?
        if ( $_POST["$pkey"] > 0 ) $update = true;
        else $insert = true;

        //sanitization en validation
        Validate();

        //sql opbouwen
        $sql = BuildSQL( $update, $insert, $table, $pkey);
        //var_dump($sql);

        //run SQL
        $_SESSION['last_sql'] = $sql;
        $result = ExecuteSQL( $sql );

        //output if not redirected
        print $sql ;
        print "<br>";
        print $result->rowCount() . " records affected";

        //redirect after insert or update

        if ( $insert AND $_POST["afterinsert"] > "" ) header("Location: ../" . $_POST["afterinsert"] );
        if ( $update AND $_POST["afterupdate"] > "" ) header("Location: ../" . $_POST["afterupdate"] );

    }
}

function BuildSQL( $update, $insert, $table, $pkey)
{
    if ( $update ) $sql = "UPDATE $table SET ";
    if ( $insert ) $sql = "INSERT INTO $table SET ";

    //make key-value string part of SQL statement
    $keys_values = [];

    foreach ( $_POST as $field => $value )
    {
        //skip non-data fields
        if ( in_array( $field, [ 'table', 'pkey', 'afterinsert', 'afterupdate', 'csrf' ] ) ) continue;

        //handle primary key field
        if ( $field == $pkey )
        {
            if ( $update ) $where = " WHERE $pkey = $value ";
            continue;
        }

        //all other data-fields
        $keys_values[] = " $field = '$value' " ;
    }

    $str_keys_values = implode(" , ", $keys_values ); // img_title='berlin.jpg' , img_width='456' , ...

    //extend SQL with key-values
    $sql .= $str_keys_values;

    //extend SQL with WHERE
    $sql .= $where;

    return $sql;
}