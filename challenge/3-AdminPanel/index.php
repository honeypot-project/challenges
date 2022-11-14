<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/logincheck.php');
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HoneyPot 16</title>
    <link rel="stylesheet" type="text/css" href="3-AdminPanel/style.css">
    <!--  <a href = "challenge/3-AdminPanel/source.txt>A tiny hint hihi</a>-->
    <title>Honeypot 16</title>
</head>
<body>
<form class="box" action="3-AdminPanel/flag.php" method="get">
    <h1>BE A LITTLE LESS BASIC, YOU SHEEP!</h1>
    <h3>enter the correct password to access the administrator panel</h3>
    <input type="password" name="passwd" placeholder="Password" required><input type="submit" value="LOGIN"/></form>
</body>
</html>