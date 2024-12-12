<?php
require_once("util-db.php");
require_once("model-rank.php");

$pageTitle = "Rank";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType'])) {
    case "Add":
      if (insertrank($_POST['rnumber'], $_POST['rtotalpoints'])) {
        echo '<div class="alert alert-success" role="alert">Rank added.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Delete":
      if (deleterank($_POST['rid'])) {
        echo '<div class="alert alert-success" role="alert">Rank deleted.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
  }
}
$rank = selectrank();
include "view-rank.php";
include "view-footer.php";
?>
