<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/logincheck.php');
checkLogin();
header('This-is-odd: L1MzQ1JFVC50eHQ=');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HoneyPot 16</title>
    <link rel="stylesheet" type="text/css" href="./login_style.css">
    <!--<p>Keep looking, I'm not hidden in the HTML</p>-->
</head>
<body>
<h1 id="challenge5">I am hidden in plain sight</h1>

<img src="5/answer.jpg" alt="answer" title="synonym">

</body>
</html>
