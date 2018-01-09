<?php

include "../controller/controller.php";

$view = router ();

include "head.php";
include "header.php";
displayAlerts ();
include "$view.php";
displayAlerts ();
include "footer.php";

$db = null;

