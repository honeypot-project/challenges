<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/logincheck.php');
checkLogin();

$cookie_name = "session";
if (isset($_COOKIE[$cookie_name])) {
    $cookie_value = base64_decode((base64_decode($_COOKIE[$cookie_name])));

    echo "<br><br><br><center><h1>Welcome to your personal area, $cookie_value!</h1></center>";


    if (strtolower($cookie_value) == "admin") {

        echo "<br><br><br>";
        echo "<center><h2>FLAG{INSECURE-COOKI3-VULNERABILITY}</h2></center>";
    }

    echo "<div class='topcorner'><a href='./logout.php'>Logout</a></div>";
} else {
    echo "<h1>You are not logged in!</h1><br><h3><a href='index.php'>Home</a></h3";
}

?>

<head>
    <title>Challenge 2</title>
    <link rel="stylesheet" href="login_style.css">
</head>
