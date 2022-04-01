<?php
require("../helper/glpiHelper.php");
session_start();
if (!$_SESSION["login"]) header("location:../login.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="w-full px-28 bg-blue-500">
    <div class="flex flex-row py-5">
      <div class="w-1/2">
        <a href="../asset" class="hover:opacity-75 pr-3">Asset</a>
        <a href="../ticket" class="hover:opacity-75 px-3 border-l">Ticket</a>
      </div>
      <div class="text-right w-1/2">
        <a href="../logout.php" class="hover:opacity-75 justify-self-end">Logout</a>
      </div>
    </div>
  </div>
