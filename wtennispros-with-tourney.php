<?php
require_once("util-db.php");
require_once("model-wtennispros-with-tourney.php");

$pageTitle = "Womens Tennis Pros Tournaments";
include "view-header.php";
if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) { 
    case "Add":
      if (insertwomenstennispros($_POST['name'], $_POST['country'])) {
        echo '<div class="alert alert-success" role="alert">Womens Tennis Pro added.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Edit":
      if (updatewomenstennispros($_POST['name'], $_POST['country'], $_POST['wid'])) {
        echo '<div class="alert alert-success" role="alert">Womens Tennis Pro edited.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Delete":
      if (deletewomenstennispros($_POST['wid'])) {
        echo '<div class="alert alert-success" role="alert">Womens Tennis Pro deleted.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
  } 
}
$womenstennispros = selectwomenstennispros ();
include "view-wtennispros-with-tourney.php";
include "view-footer.php";
?>
