<?php
$output_arrays=array(
    array(
		"id" => "1",
		"title"=>"Evento 1",
		"start"=>date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2015)),
		"end"=>date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2015)),
		"url"=>"google.it"
		),
    array(
		"id" => "2",
		"title"=>"Evento 2",
		"start"=> date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2015)),
		"end"=>date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2015)),
		"url"=>"google.it"
		),
	 array(
		"id" => "3",
		"title"=>"Evento 3",
		"start"=> date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2015)),
		"end"=>date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2015)),
		"url"=>"google.it"
		)
);
echo json_encode($output_arrays);
?>
