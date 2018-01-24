<?php
  if (isset($_POST['name']) and isset($_POST['phone']) and isset($_POST['email']))
  	// Hey Huong, please return data in this format! Thank you! -Rachael
    echo '{"id":"'.rand(0000,9999).'","name":"'.$_POST['name'].'","phone":"'.$_POST['phone'].'","email":"'.$_POST['email'].'"}';
  else
    echo "fail whale :(";
?>
