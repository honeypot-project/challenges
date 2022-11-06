<?php
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

