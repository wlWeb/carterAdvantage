<?php

require_once('initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('../admin.php');
}

$id = $_GET['id'];


  $result = delete_message($id);
  redirect_to('../admin.php');


?>