<?php
require_once("util-db.php");
require_once("model-womenstennispros.php");

$pageTitle = "Womens Tennis Pros";
include "view-header.php";
$womenstennispros = selectwomenstennispros ();
include "view-womenstennispros.php";
include "view-footer.php";
?>
