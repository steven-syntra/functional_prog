<?php
session_start();

print "Blabla: " . $_SESSION['blabla'];

print "Session id = " . session_id();

session_regenerate_id();
session_destroy();
unset($_SESSION);

print "Blabla: " . $_SESSION['blabla'];