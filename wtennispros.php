<?php
require_once("util-db.php");
require_once("model-wtennispros.php");

$pageTitle = "Womens Tennis Pros";
include "view-header.php";
$womenstennispros = selectwomenstennispros ();
include "view-wtennispros.php";
include "view-footer.php";
?>
