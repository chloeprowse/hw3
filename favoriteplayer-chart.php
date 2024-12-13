<?php
require_once("util-db.php");
require_once("model/favoriteplayer.php");
require_once("model/favoriteplayer-chart.php");

$pageTitle = "Favorite Player Chart";
include "view/header.php";

$favoriteplayer = selectfavoriteplayer();
include "view/favoriteplayer-chart.php";
include "view/footer.php";
?>
