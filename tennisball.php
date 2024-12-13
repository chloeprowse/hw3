<?php
require_once("util-db.php");
require_once("model/tennisball.php");

$pageTitle = "Tennis Balls Used";
include "view/header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) { 
    case "Add":
      if (inserttennisball($_POST['tbbrand'], $_POST['tbcolor'], $_POST['wid'])) {
        echo '<div class="alert alert-success" role="alert">Tennis Ball added.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Edit":
      if (updatetennisball($_POST['tbbrand'], $_POST['tbcolor'], $_POST['tid'])) {
        echo '<div class="alert alert-success" role="alert">Tennis Ball edited.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Delete":
      if (deletetennisball($_POST['tid'])) {
        echo '<div class="alert alert-success" role="alert">Tennis Ball deleted.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
  }
}
$tennisball = selecttennisball();
include "view/tennisball.php";
include "view/footer.php";
?>
