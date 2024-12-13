<?php
require_once("util-db.php");
require_once("model/tourney-by-wtennispro.php");

$pageTitle = "Womens Tennis Tournamets";
include "view-header.php";
$rank = selecttourneybywtennispro ($_GET['id']);
include "view-tourney-by-wtennispro.php";
include "view-footer.php";
?>
