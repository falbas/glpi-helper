<?php
require("helper/glpiHelper.php");
session_start();

$_SESSION["client"]->killSession();
unset($_SESSION["client"]);
unset($_SESSION["login"]);

header("location:./login.php");
