<?php
date_default_timezone_set('America/New_York'); 

$file = fopen($dataFile, 'r');
while (($line = fgetcsv($file)) !== FALSE)
{
    $posts[] = array('postingUser' => $line[0],
                'postingTime' => date('M j ga', $line[1]),
                'postedMessage' => $line[2]);
}
fclose($file);