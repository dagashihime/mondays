<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

date_default_timezone_set('Europe/Amsterdam');

/*
 * Command: "php monday.php 2024-01-31 2024-03-04"
 */
[$path, $dateStart, $dateEnd] = array_pad($argv, 2, null);

if(is_null($dateStart) || is_null($dateEnd)) {
    echo "Both parameters are required!";
    die;
}

$dateStart = Carbon::parse($dateStart)->next(Carbon::MONDAY);
$dateEnd = Carbon::parse($dateEnd);

for ($date = $dateStart; $date->lte($dateEnd) && $date->copy()->endOfWeek()->lte($dateEnd); $date->addWeek()) {
    echo $date->format('d F Y') . PHP_EOL;
}
