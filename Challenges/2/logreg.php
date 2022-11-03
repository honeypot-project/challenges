<link rel="stylesheet" href="login_style.css">
<?php
error_reporting(0);
    $cookie_name = "session";

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "tut";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn){
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST["login"]))
    {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        $phash = sha1(sha1($pass . "salt") . "salt");

        if (is_string($user) && is_string($pass) && !strpos($user, "'") && !strpos($user, '"')
            && !strpos($user, '=') && !strpos($user, '--') && !strpos($user, ";") && !strpos($pass, '"')
            && !strpos($pass, "'") && !strpos($pass, '--') && !strpos($pass, ';') && !strpos($pass, '=')) {
            $sql = "SELECT * FROM users WHERE username='$user' AND password='$phash';";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);

            if ($count >= 1){
                $cookie_value = base64_encode($user);
                setrawcookie($cookie_name, $cookie_value, time() + (10 * 365 * 24 * 60 * 60), "/");
                header("Location: /Challenges/2/personal.php");
            }
            else {
                echo "<center><h1>Username or password is incorrect!</h1><br><br><h3><a href='/Challenges/2/index.php'>Home</a><h3></center>";
            }

        } else {
            echo "Something went wrong";
        }
    }
    elseif (isset($_POST["register"])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        if (!isset($user)) {
            echo "Please fill in both the username and password field. <br><br> <a href='/Challenges/2/index.php'>Home</a>";
        }

        if (is_string($user) && is_string($pass) && !strpos($user, "'") && !strpos($user, '"')
            && !strpos($user, '=') && !strpos($user, '--') && !strpos($user, ";") && !strpos($pass, '"')
            && !strpos($pass, "'") && !strpos($pass, '--') && !strpos($pass, ';') && !strpos($pass, '=')) {

            $sql = "SELECT * FROM users WHERE username='$user';";

            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);

            if ($count < 1) {

                $phash = sha1(sha1($pass . "salt") . "salt");

                if ($pass == "dbb86863682eb7ebd9bbb1788de12c25068450ed") {
                    echo "Cannot leave password field blank.";
                } else {
                    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$phash');";

                    $result = mysqli_query($conn, $sql);

                    echo "<center><h1>Account registered successfully!</h1><br><br><h3><a href='/Challenges/2/index.php'>Login</a><h3></center>";

                }
            } else {
                echo "<center><h1>An account with that username already exists.</h1><br><br><h3><a href='/Challenges/2/index.php'>Home</a></h3></center>";
            }
        } else {
            echo "Something went wrong";
        }
    }
?>
