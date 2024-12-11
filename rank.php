<?php
require_once("util-db.php");
require_once("model-rank.php");

$pageTitle = "Rank";
include "view-header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) {
    case "Add":
     insertrank($_POST['rnumber'], $_POST['rtotalpoints']);
     break;
  }
}
$rank = selectrank ();
include "view-rank.php";
include "view-footer.php";
?>
