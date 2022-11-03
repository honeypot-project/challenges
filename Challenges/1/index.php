<?php
error_reporting(0);
$msg='';
$flag='';

$msg=($_GET['msg']);

if(isset($msg)){
    if($msg=="<img src='' onerror=alert(1)>"){
        $flag='FLAG{XSS-IS-EASY-PEASY-LEMON-SQEEZY}';
        $msg= $msg;
    }
    else if ($msg){
        $msg= htmlspecialchars($msg);
    }
}
else{}
?>

<!DOCTYPE html><html lang="en">
<head><meta charset="UTF-8"><title></title>
</head>
<body>

<h2> <?php echo $msg; ?><br><?php echo $flag; ?> </h2>
<img src="/Challenges/1/reflect.png">
<form id="myForm">

    <input id="msg" type="text" name="msg" value="">
    <br>
    <input type="button" value="Submit" onclick="getcontent();">
</form>

<script type="text/javascript">
  function getcontent(){

    document.getElementById("msg").value= document.getElementById("msg").value;

    document.getElementById("myForm").submit();
  }

</script>

</body>
</html>

