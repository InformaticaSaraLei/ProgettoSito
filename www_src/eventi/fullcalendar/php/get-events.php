<?php
/*
require_once "../lib/evento_original.php"
// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';

// Short-circuit if the client did not give us a date range.
if (!isset($_GET['start']) || !isset($_GET['end'])) {
	die("Please provide a date range.");
}

// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
// Since no timezone will be present, they will parsed as UTC.
$range_start = parseDateTime($_GET['start']);
$range_end = parseDateTime($_GET['end']);

// Parse the timezone parameter if it is present.
$timezone = null;
if (isset($_GET['timezone'])) {
	$timezone = new DateTimeZone($_GET['timezone']);
}
$manager=new EventiManager;
$input_arrays = $manager->getEventiAssoc();

// Accumulate an output array of event data arrays.
$output_arrays = array();
foreach ($input_arrays as $array) {

	// Convert the input array into a useful Event object
	$event = new Event($array, $timezone);

	// If the event is in-bounds, add it to the output
	if ($event->isWithinDayRange($range_start, $range_end)) {
		$output_arrays[] = $event->toArray();
	}
}

// Send JSON to the client.
echo json_encode($output_arrays);
*/
$output_arrays=array(
    array(
		"id" => "1",
		"title"=>"Evento 1",
		"start"=>date(DATE_ATOM, mktime(0, 0, 0, 11, 30, 2014)),
		"end"=>date(DATE_ATOM, mktime(0, 0, 0, 11, 30, 2014)),
		"url"=>"google.it"
		),
    array(
		"id" => "2",
		"title"=>"Evento 2",
		"start"=> date(DATE_ATOM, mktime(0, 0, 0, 12, 1, 2014)),
		"end"=>date(DATE_ATOM, mktime(0, 0, 0, 12, 1, 2014)),
		"url"=>"google.it"
		),
	 array(
		"id" => "3",
		"title"=>"Evento 3",
		"start"=> date(DATE_ATOM, mktime(0, 0, 0, 12, 4, 2015)),
		"end"=>date(DATE_ATOM, mktime(0, 0, 0, 12, 4, 2015)),
		"url"=>"google.it"
		)
);
echo json_encode($output_arrays);
?>
