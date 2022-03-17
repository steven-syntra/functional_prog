<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$public_access = true;
require_once "lib/autoload.php";

print str_replace("\r\n", "<br>", $container->getLogger()->ShowLog());