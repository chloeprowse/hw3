<?php
require_once("util-db.php");
require_once("model-rank.php");

$pageTitle = "Rank";
include "view-header.php";
$rank = selectrank ();
include "view-rank.php";
include "view-footer.php";
?>
