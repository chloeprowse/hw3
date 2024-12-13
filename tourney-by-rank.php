<?php
require_once("util-db.php");
require_once("model/tourney-by-rank.php");

$pageTitle = "Tournament by Rank";
include "view-header.php";
$tourney = selecttourneybyrank ($_POST['rid']);
include "view/tourney-by-rank.php";
include "view/footer.php";
?>
