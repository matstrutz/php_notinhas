<?php 
$cx = new mysqli("localhost", "root", null, "nota");
if ($cx->connect_error) {
    die("Connections failed: " . $cx->connect_error);
}
?>