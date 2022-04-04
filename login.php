<?php
session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="flex flex-col justify-center min-h-screen items-center bg-gradient-to-r from-cyan-500 to-blue-500 px-28">
    <form method="post" action="login_action.php">
      <div class="flex flex-col bg-white p-5 rounded">
        <h1 class="text-center text-4xl font-bold">Login</h1>
        <p class="mt-3">Username</p>
        <input type="text" name="username" class="border border-gray-700 rounded focus:outline-blue-500 px-1" placeholder="Username">
        <p class="mt-3">Password</p>
        <input type="password" name="password" class="border border-gray-700 rounded focus:outline-blue-500 px-1" placeholder="Password">
        <input type="submit" class="mt-3 rounded bg-gray-400 hover:bg-gray-500" value="Login">
      </div>
    </form>
    <?php if (isset($_SESSION["login"][1])) { ?>
      <p class="text-center">Username atau password salah</p>
    <?php } ?>
  </div>
</body>

</html>
