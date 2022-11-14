<?php

checkLogin();

$flag = "<h3>FLAG{DEFAULT-CREDENTIALS-ARE-A-NO-GO}</h3>";
if (isset($_GET['passwd'])) {

        if (( $_GET['passwd']) == 'admin'){
            echo "<h1>Here is your gift :</h1>".$flag;
        } else {
            echo "<h4>Get the hell outta here, run run run!</h4>";
    }
}
?>
<link rel="stylesheet" type="text/css" href="/challenge/3-AdminPanel/style.css">