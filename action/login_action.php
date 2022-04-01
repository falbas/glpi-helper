<?php
require("../helper/glpiHelper.php");
session_start();

use glpiHelper\glpiHelper;

$client = new glpiHelper();
$_SESSION["client"] = $client;

$_SESSION["client"]->initSession($_POST["username"], $_POST["password"]);
$_SESSION["login"] = $client->sessionToken;

header("location:../asset");
