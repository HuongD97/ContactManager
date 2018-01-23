<?php
  if (isset($_GET['id']))
  	// Hey Huong, please return data in this format! Thank you! -Rachael
    echo '{"id":"'.$_GET['id'].'","name":"Eddings, David","phone":"(407)123-4567","email":"dmarino@ucf.com"}';
  else
    echo "fail whale :(";
?>
