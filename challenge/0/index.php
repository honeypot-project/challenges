<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/logincheck.php');
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>honeypot 16</title>
    <link rel="stylesheet" href="./screen.css">
</head>
<body>
    <div>
        <h1>FLAG{WOW-YOU-FOUND-ME-GOOD-JOB-WIZARD}</h1>
    </div>
</body>
</html>
