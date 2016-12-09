<?php
set_time_limit(0);
error_reporting(0);

require "common/libs/AdobeConnectClient.class.php";

$adobeClient = new AdobeConnectClient();
$result = "";

$principal_id = array(
	'moderador1' => '1346915838',
	'moderador2' => '1346944162',
	'moderador3' => '1346970956',
	'moderador4' => '1347009796',
	'moderador5' => '1347009879',
	'moderador6' => '1346962333',
	'moderador7' => '1347000129',
	'moderador8' => '1347010357',
	'moderador9' => '1347038693',
	'moderador10' => '1346972577',
	'moderador11' => '1346972734',
	'moderador12' => '1347038925',
	'moderador13' => '1347057328',
	'moderador14' => '1347048081',
	'moderador15' => '1347001292',
	'moderador16' => '1531745188',
	'moderador17' => '1531745831',
	'moderador18' => '1531800835',
	'moderador19' => '1531736176',
	'moderador20' => '1531800725'
);

for($mod = 1; $mod <= 20; $mod++) {

	$username = "moderador" . $mod;
	$password = "utp.moderador" . $mod;

	$adobeClient->setUser($username);
	$adobeClient->setPassword($password);

	$adobeClient->makeAuth();

	$short = $adobeClient->getShortCut();

	$myMeetings = $short['shortcuts']['sco'];

	$folder_id;

	for($i = 0; $i < count($myMeetings); $i++) {
		if($myMeetings[$i]['@attributes']['type'] == "my-meetings") {
			$folder_id = $myMeetings[$i]['@attributes']['sco-id'];
			break;
		}
	}

	$numero_sala = $mod * 2;

	for($j = ($numero_sala - 1); $j <= $numero_sala; $j++) {

		$create = $adobeClient->createMeeting($folder_id, "Capacitacion Docentes " . $j, "2016-11-23T15:00", "2016-11-23T16:00", "capacitaciondocente" . $j);

		$public = $adobeClient->setPublicMeeting($create);

		$host = $adobeClient->setPermissionsMetting($principal_id['moderador'.$mod], $create);

		echo "Creando sala # " . $j . " en el moderador ". $mod . "\r\n";
	}
}

print_r($public['status']['@attributes']['code']);