<?php

setcookie("session", "val", time() - (10 * 365 * 24 * 60 * 60), "/");
header("Location: /../2/index.php");

?>