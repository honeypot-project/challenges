<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/logincheck.php');
checkLogin();
header('Content-Odd: 2f 53 33 43 52 45 54 2e 74 78 74');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenge 5</title>
    <meta name="hint" content="Keep looking, I'm not hidden in the HTML bro...">
    <link rel="stylesheet" type="text/css" href="../login_style.css">
</head>
<body>
<h1 id="challenge5">I am hidden in plain sight</h1>

<img src="./answer.jpg" alt="answer" title="synonym">

</body>
</html>
