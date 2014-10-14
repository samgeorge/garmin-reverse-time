<?php

/**

GARMIN REALLY BROKE.

Looked on my garmin it had one point at 2014 (current year) and the next point was 2019

I worked the diff and created the $timeToRemove var - then chnaged all the time vals in the XML to be correct.

*/

$timeToRemove = 141609600 + 46800 + 3120 + 20;

$dom=new DOMDocument();
$dom->load('./gpx_test.gpx');

$root = $root=$dom->documentElement;

$markers=$root->getElementsByTagName('trkpt');

foreach($markers as $marker) {

	$time = $marker->getElementsByTagName('time');
	
	if(strtotime($time->item(0)->nodeValue) > date('U')) {

		$mytime = strtotime($time->item(0)->nodeValue) - ( $timeToRemove );

		$bob = $time->item(0)->nodeValue = date('c',$mytime);

		$time->item(0)->nodeValue = str_replace('+00:00', 'Z', $time->item(0)->nodeValue);

		echo $bob . PHP_EOL;
	}
}

$xml =  $dom->saveXML();

file_put_contents('./new_gpx.gpx', $xml);
