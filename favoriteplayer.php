<?php
require_once("util-db.php");
require_once("model-favoriteplayer.php");

$pageTitle = "Add your favorite tennis player!";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) { 
    case "Add":
      if (insertfavoriteplayer($_POST['name'], $_POST['player'])) {
        echo '<div class="alert alert-success" role="alert">Favorite Player added.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Edit":
      if (updatefavoriteplayer($_POST['name'], $_POST['player'], $_POST['fid'])) {
        echo '<div class="alert alert-success" role="alert">Favorite Player edited.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Delete":
      if (deletefavoriteplayer($_POST['fid'])) {
        echo '<div class="alert alert-success" role="alert">Favorite Player deleted.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
  }
}
$tennisball = selectfavoriteplayer();
include "view-favoriteplayer.php";
include "view-footer.php";
?>
