<link rel="stylesheet" href="login_style.css">
<?php
error_reporting(0);
$cookie_name = "session";

$servername = "localhost";
$username = "root";
$password = "root";
$database = "tut";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST["login"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $phash = sha1(sha1($pass . "salt") . "salt");


    $stmt = $conn->prepare('SELECT * FROM users where username = ? AND password = ?');
    $stmt->bind_param("ss", $user, $phash);

    $stmt->execute();
    $result = $stmt->get_result();

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

    $stmt = $conn->prepare("SELECT * FROM users WHERE username= ? ");
    $stmt->bind_param("s", $user);

    $stmt->execute();
    $result = $stmt->get_result();

    $count = mysqli_num_rows($result);

    if ($count != 0) {
        echo "<h1>An account with that username already exists.</h1><br><br><h3><a href='/Challenges/2/index.php'>Home</a></h3>";
        return;
    }

    $phash = sha1(sha1($pass . "salt") . "salt");

    if ($pass == "dbb86863682eb7ebd9bbb1788de12c25068450ed") {
        echo "Cannot leave password field blank.";
    } else {
        $stmt = $conn -> prepare("INSERT INTO users (username, password) VALUES (?, ?);");
        $stmt->bind_param("ss", $user, $phash);

        $success = $stmt->execute();

        echo ("<script>console.log($success);</script>");

        if ($success) {
            echo "<h1>Account registered successfully!</h1><br><br><h3><a href='/Challenges/2/index.php'>Login</a><h3>";
            return;
        }

        echo "<h1>Failed to create account</h1><br><br><h3><a href='/Challenges/2/index.php'>Go back</a><h3>";
    }
    $stmt->close();
    $conn->close();
}
?>

