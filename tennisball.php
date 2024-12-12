<?php
require_once("util-db.php");
require_once("model-tennisball.php");

$pageTitle = "Tennis Balls Used";
include "view-header.php";
$tennisball = selecttennisball ();
include "view-tennisball.php";
include "view-footer.php";
?>
