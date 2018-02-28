<?php
include("header.php");

if (isset($_SESSION['connecte'])) {
header ('location: login.php');
//go to login.php;
}
echo ("Admin page");
//echo "<li></li>";
echo'<form action="logout.php" method="post">';
echo'<input type="submit" value="Deconnect" /></li>';
echo '</form>';
?>