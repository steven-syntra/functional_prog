<?php

class MessageService
{
    private $errors;
    private $input_errors;
    private $infos;

    public function __construct()
    {
        $this->errors = $this->LoadMessages("errors");
        $this->input_errors = $this->LoadMessages("input_errors");
        $this->infos = $this->LoadMessages("infos");
    }

    public function LoadMessages( $type )
    {
        $returnvalue = null;

        if ( isset( $_SESSION[$type]) )
        {
            $returnvalue = $_SESSION[$type];
            unset($_SESSION[$type]);
        }

        return $returnvalue;
    }

    public function CountNewErrors()
    {
        if ( isset($_SESSION['errors']) AND count($_SESSION['errors']) > 0 ) return count($_SESSION['errors']);
        else return 0;
    }

    public function CountErrors()
    {
        if ( $this->errors ) return count($this->errors);
        else return 0;
    }

    public function CountNewInputErrors()
    {
        if ( isset($_SESSION['input_errors']) AND count($_SESSION['input_errors']) > 0 ) return count($_SESSION['input_errors']);
        else return 0;
    }

    public function CountInputErrors()
    {
        if ( $this->input_errors ) return count($this->input_errors);
        else return 0;
    }

    public function GetInputErrors()
    {
        return $this->input_errors;
    }

    public function CountNewInfos()
    {
        if ( isset($_SESSION['infos']) AND count($_SESSION['infos']) > 0 ) return count($_SESSION['infos']);
        else return 0;
    }

    public function CountInfos()
    {
        if ( $this->infos ) return count($this->infos);
        else return 0;
    }

    public function AddMessage( $type, $msg, $key = null )
    {
        if ( $type == "input_errors" ) $_SESSION[$type][$key] = $msg;
        else $_SESSION[$type][] = $msg;
    }

    public function ShowErrors()
    {
        if ( $this->CountErrors() > 0 )
        {
            foreach ( $this->errors as $error )
            {
                print '<div class="error">' . $error . '</div>';
            }
        }
    }

    public function ShowInfos()
    {
        if ( $this->CountInfos() > 0 )
        {
            foreach ( $this->infos as $info )
            {
                print '<div class="msgs">' . $info . '</div>';
            }
        }
    }

}