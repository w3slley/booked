<?php
include "../classes/BookEvent.php";

$get = new BookEvent();
$year = $get->get_last_year(1);
echo $year;