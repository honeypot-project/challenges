<?php
// import function
require_once 'challenge/logincheck.php';
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HoneyPot 16</title>
    <link rel="icon" type="image/x-icon" href="assets/media/favicon.ico">
    <link rel="stylesheet" href="challenge-assets/css/reset.css">
    <link rel="stylesheet" href="challenge-assets/css/screen.css">
</head>
<body>

<div id="main-container">
    <img src="images/doors-background.jpg" usemap="#image-map" alt="doors-challenges">

    <map name="image-map">
        <area target="_blank" alt="1" title="1" href="challenge/1" coords="71,232,209,516" shape="rect">
        <area target="_blank" alt="2" title="2" href="challenge/2" coords="320,238,456,512" shape="rect">
        <area target="_blank" alt="3" title="3" href="challenge/3" coords="577,239,711,518" shape="rect">
        <area target="_blank" alt="4" title="4" href="challenge/4" coords="817,231,963,515" shape="rect">
        <area target="_blank" alt="5" title="5" href="challenge/5" coords="1074,236,1218,518" shape="rect">
    </map>
</div>

<div id="challenges">
    <p>Welcome to our challenge panel</p>
    <p>Solve the challenges and submit the flags <br><br><a href="/dashboard.html">on this link</a><br><br>HAVE FUN!!!</p>
    <p>Greetings from <br>Ali, Miguel, Sinan</p>
</div>

</body>
</html>
