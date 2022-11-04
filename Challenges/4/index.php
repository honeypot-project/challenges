<?php
// Connect to database
$dbhost = "localhost";
$dbname = "sqlidemo";
$dbuser = "demo";
$dbpass = "youllneverguessmypassword";
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$authorized = false;

// Get user input
if (!empty($_POST)) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // Validate user
    $query = 'SELECT * FROM users WHERE username="' . $user . '" AND password="' . $pass . '"';
    $result = mysqli_query($db, $query);
    if (!$result) {
        $error = mysqli_error($db);
    } else if (mysqli_num_rows($result) > 0) {
        $authorized = true;
        $rows = mysqli_fetch_assoc($result);
        $user = $rows['username'];
        $pass = $rows['password'];
    } else {
        $query = 'SELECT * FROM users WHERE username="' . $user . '"';
        $result = mysqli_query($db, $query);
        if (!$result || mysqli_num_rows($result) == 0) {
            $error = "Invalid username.";
        } else {
            $error = "Invalid password.";
        }
    }
    // Close database connection
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HoneyPot 16</title>
    <meta name="description" content="Hint: Use SQL injection to bypass authentication and login as Admin!">
    <link rel="stylesheet" type="text/css" href="/Challenges/2/login_style.css">
</head>
<body>
<?php if (!$authorized) { ?>

    <center><br><br><br><br><br><br><br>
        <h1 class="container">Login/Register</h1>

        <div class="form">
            <form method="post" accept-charset="utf-8">
                <label>Username: </label><input type="text" name="username"
                                                value="<?php if (!empty($user)) echo $user; ?>" placeholder="Username"
                                                required><br><br>
                <label>Password: </label><input type="password" name="password" value="" placeholder="Password"
                                                required><br><br>
                <input type="submit" name="login" value="Login" class="button">
                <?php if (!empty($error)) echo '<p class="error">' . $error . '</p>'; ?>
            </form>
        </div>
    </center>
    <p class="hint">The goal of this challenge is to login
    <br>with a valid user.

<?php } else if ($_POST['username'] != $user || $_POST['password'] != $pass) { ?>
    <div>
        <h2>Welcome <?php echo $user; ?>!</h2>
        <p>Congratulations on completing the SQL injection challenge!</p>
        <p>You have successfully bypassed authentication security.</p>
        <h2>FLAG{YOU-ARE-A-BEAST-GOOD-JOB-NERD}</h2>
        <form><input class="logout" type="submit" value="Logout"></form>
        <img src="/Challenges/4/hackerman.jpg" alt="Hackerman!">
    </div>

<?php } else { ?>
    <div>
        <h2>Welcome <?php echo $user; ?>!</h2>
        <p>Congratulations on remembering your password.</p>
        <p>You didn't pass the challenge, however. Try again nerd!</p>
        <form><input class="logout" type="submit" value="Logout"></form>
    </div>

<?php }
?>
</body>
</html>
