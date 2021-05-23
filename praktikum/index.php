<?php
// All interaction goes through the index and isforwarded
// directly to the controller
include_once("controller/Controller.php");
$controller = new Controller();
$controller->invoke();
?>