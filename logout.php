// End session, reset UserID variable, send user back to main page

<?php
    session_start();
    unset($_SESSION["UserID"]);
    header("Location: index.php");  
?>