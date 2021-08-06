<?php
// session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define("HOST","localhost");
define("USER","root");
define("PASS",NULL);
define("DB","uglearner");
// define("DIR","");

?>