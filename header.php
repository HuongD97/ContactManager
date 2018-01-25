<?php
// we need session start to apply to all php pages so the session is maintained
session_start();
// creates db connection only the first time header is included
require_once "dbinit.php";
?>
