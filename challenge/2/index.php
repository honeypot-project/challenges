<?php

require_once 'challenge/logincheck.php';
checkLogin();

$cookie_name = "session";

if (isset($_COOKIE[$cookie_name])) {
    header("Location: ./2/personal.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>honeypot 16</title>
    <meta name="description" content="HINT: become admin!!!">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login_style.css">
</head>
<body>
<center><br><br><br><br><br><br><br>


    <h1 class="container">Login/Register</h1>

    <div class="form">
        <form action="/challenge/2/logreg.php" method="post" accept-charset="utf-8">
            <label>Username: </label><input type="text" name="username" value="" placeholder="Username"
                                            required><br><br>
            <label>Password: </label><input type="password" name="password" value="" placeholder="Password"
                                            required><br><br>
            <input type="submit" name="login" value="Login" class="button">
            <input type="submit" name="register" value="Register" class="button">
        </form>
    </div>
</center>
</body>
</html>