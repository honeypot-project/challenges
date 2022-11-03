<?php

$flag = "FLAG{DEFAULT-CREDENTIALS-ARE-A-NO-GO}";
if (isset($_GET['passwd'])) {

        if (( $_GET['passwd']) == 'admin'){
            echo "<h1>Here is your gift :</h1>".$flag;
        } else {
            echo "Get the hell outta here, run run run!";
    }
}
?>