<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

header("location:../main/index.php");

session_destroy();

?>