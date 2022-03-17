<?php
if ( isset($public_access) ) CheckAccess($public_access);
else CheckAccess();

function CheckAccess($public_access = false)
{
    if ( ! $public_access AND ! isset($_SESSION['user']) )
    {
        GoToNoAccess();
    }
}

function GoToNoAccess($app_root = "")
{
    header("Location: " . $app_root . "/no_access.php");
    exit;
}

