<?php

function Validate()
{
    Sanitize();

    $table = $_POST['table'];
    $pkey = $_POST['pkey'];

    $sql = "SHOW FULL COLUMNS FROM $table";
    $rows = GetData($sql);

    $fields_values = [];
    foreach ( $rows as $row )
    {
        $fieldname = $row['Field'];
        $fieldtype = $row['Type'];
        $fieldlength = 0;

        //tekstvelden
        if ( strpos( $fieldtype, "varchar" ) !== false ) //als 'varchar' voorkomt in $fieldtype
        {
            $begin_length = strpos( $fieldtype, "(" );
            $end_length = strpos( $fieldtype, ")" );
            $fieldlength = substr( $fieldtype, $begin_length + 1, $end_length - $begin_length - 1 );

            if( strlen( $_POST[$fieldname] ) > $fieldlength )
            {
                $real_length = strlen( $_POST[$fieldname]);
                print "Het veld $fieldname is $real_length tekens lang en mag maar $fieldlength tekens zijn";
                die();
            }
        }

        //getallen
        if ( strpos( $fieldtype, "int" ) !== false ) //als 'int' voorkomt in $fieldtype
        {
            if ( ! is_numeric( $_POST[$fieldname] ))
            {
                print "Het veld $fieldname is een int en mag enkel cijfers bevatten";
                die();
            }
        }

    }
}


function Sanitize()
{
    foreach ( $_POST as $field => $value )
    {
        $_POST[$field] = htmlentities( trim($value), ENT_QUOTES );
    }
}
