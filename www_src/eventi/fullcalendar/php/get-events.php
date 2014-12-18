<?php
include_once "../../lib/evento.php";
// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';

$manager = new EventiManager;

echo json_encode($manager->getEventiAssoc());

?>
