<?php
session_start('wtp_user');

require_once 'inc/class.php';

$db = new Database();
$main = new Main();
$connString = $db->getConstring();

$main->getMain();

?>