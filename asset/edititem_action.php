<?php
require("../helper/glpiHelper.php");
session_start();

$itemattribute = [];
$itemattribute += ["name" => $_POST["itemname"]];

$item = $_SESSION["client"]->updateItem($_POST["itemtype"], $_POST["id"], $itemattribute);

header("location:.?itemtype=".$_POST["itemtype"]);
