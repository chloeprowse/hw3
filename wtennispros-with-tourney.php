<?php
require_once("util-db.php");
require_once("model/wtennispros-with-tourney.php");

$pageTitle = "Womens Tennis Pros Tournaments";
include "view/header.php";


$womenstennispros = selectwomenstennispros ();
include "view/wtennispros-with-tourney.php";
include "view/footer.php";
?>
