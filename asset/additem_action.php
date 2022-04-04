<?php
require("../helper/glpiHelper.php");
session_start();

$itemattribute = [];
$itemattribute += ["name" => $_POST["itemname"]];

$item = $_SESSION["client"]->addItem($_POST["itemtype"], $itemattribute);

header("location:.?itemtype=".$_POST["itemtype"]);
