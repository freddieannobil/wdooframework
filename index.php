<?php

date_default_timezone_set('Europe/London');
error_reporting(E_ALL);//turn off when ready to sell (0) Turn on for debug E_ALL.

require __DIR__ . '/app/Bootstrap.php';

$app->run();