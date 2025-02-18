<?php
session_start();
session_unset();
session_destroy();

header("Location:https://gearlify.github.io/gearlify/landing.html");
exit();
?>