<?php

// Check if vertx cookie is present
if (isset($_COOKIE['vertx-web_session'])) {
    // request data from api
    $ch = curl_init();
    $url = 'http://localhost:8080/user';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIE, 'vertx-web.session='.$_COOKIE['vertx-web_session']);

    // get response
    $response = curl_exec($ch);
    curl_close($ch);
    $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($response_code != 200) {
        header('Location: /login.html');
    }
} else {
    header('Location: /login.html');
}


$msg = ($_GET['msg']);

if (isset($msg)) {
    if ($msg == "<img src='' onerror=alert(1)>" || $msg == '<img src="" onerror=alert(1)>') {
        $flag = 'FLAG{XSS-IS-EASY-PEASY-LEMON-SQEEZY}';
    } else if ($msg) {
        $msg = htmlspecialchars($msg);
    }
}

error_reporting(0);
$msg = '';
$flag = '';

$msg = ($_GET['msg']);

if (isset($msg)) {
    if ($msg == "<img src='' onerror=alert(1)>" || $msg == '<img src="" onerror=alert(1)>') {
        $flag = 'FLAG{XSS-IS-EASY-PEASY-LEMON-SQEEZY}';
    } else if ($msg) {
        $msg = htmlspecialchars($msg);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <title>honeypot 16</title>
    <link rel="stylesheet" href="1/screen.css">
</head>
<body>

<h2> <?php echo $msg; ?><br><?php echo $flag; ?> </h2>

<div id="flexcontainer">
    <form id="myForm">
        <input id="msg" type="text" name="msg" value="">
        <br>
        <input type="button" value="Submit" id="button" onclick="getvalue();">
    </form>
    <img src="1/reflect.png" alt="frog">

</div>

<script type="text/javascript">
  function getvalue () {

    document.querySelector('#msg').value = document.getElementById('msg').value
    document.querySelector('#myForm').submit()
  }
</script>

</body>
</html>

