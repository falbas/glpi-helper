<?php
require("helper/glpiHelper.php");
session_start();

use glpiHelper\glpiHelper;

$client = new glpiHelper("http://localhost/glpi/apirest.php");
$_SESSION["client"] = $client;

$appToken = "hsRMqMLs1BedgMSY3M5RJftgoN2NSD0gfbKpwk3J";

if (isset($_POST["usertoken"])) {
  $_SESSION["login"] = $client->initSessionWithUserToken($_POST["usertoken"], $appToken);
} else {
  $_SESSION["login"] = $client->initSessionBasic($_POST["username"], $_POST["password"], $appToken);
}

if (isset($_SESSION["login"]["session_token"])) {
  header("location:asset");
} else {
  header("location:login.php");
}
