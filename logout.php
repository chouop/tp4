<?php
require_once("init.php");
// On démarre la session
session_start ();

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();
//redirection a la page login
header ('location: login.php');
?>