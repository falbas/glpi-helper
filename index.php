<?php
if (isset($_SESSION["login"]["session_token"])) {
  header("location:asset");
} else {
  header("location:login.php");
}
