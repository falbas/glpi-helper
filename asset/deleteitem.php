<?php
require("../helper/glpiHelper.php");
session_start();

$item = $_SESSION["client"]->deleteItem($_GET["itemtype"], $_GET["id"]);

header("location:.?itemtype=".$_GET["itemtype"]);
