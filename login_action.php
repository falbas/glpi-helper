<?php
require("helper/glpiHelper.php");
session_start();

use glpiHelper\glpiHelper;

$client = new glpiHelper();
$_SESSION["client"] = $client;
$_SESSION["login"] = $client->initSession($_POST["username"], $_POST["password"]);

if (isset($_SESSION["login"]["session_token"])) {
  header("location:asset");
} else {
  header("location:login.php");
}
