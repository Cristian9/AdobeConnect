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
	'moderador20' => '1531800725',
	'moderador21' => '1693441415',
	'moderador22' => '1693450382',
	'moderador23' => '1693450751',
	'moderador24' => '1693450788',
	'moderador25' => '1693441590',
	'moderador26' => '1693478183',
	'moderador27' => '1693424578',
	'moderador28' => '1693468716',
	'moderador29' => '1693451008',
	'moderador30' => '1693424742',
);

/******************************/

$user = $_GET['user'];
$name = $_GET['name'];
$link = $_GET['link'];

$username = "moderador" . $user;
$password = "2017.moderador" . $user;

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

$create = $adobeClient->createMeeting($folder_id, $name, "2017-05-08T15:00", "2017-05-08T16:00", $link);

$public = $adobeClient->setPublicMeeting($create);

$host = $adobeClient->setPermissionsMetting($principal_id['moderador'.$user], $create);


if($public['status']['@attributes']['code'] == 'ok') {
	print_r("https://utp.adobeconnect.com/" . $link . "/");
} else {
	print_r($public);
}


/*******************************/

/*for($mod = 1; $mod <= count($principal_id); $mod++) {

	$username = "moderador" . $mod;
	$password = "2017.moderador" . $mod;

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

		$create = $adobeClient->createMeeting($folder_id, "Induccion Docente CGT " . $j, "2017-04-25T15:00", "2017-14-25T16:00", "inducciondocente" . $j);

		$public = $adobeClient->setPublicMeeting($create);

		$host = $adobeClient->setPermissionsMetting($principal_id['moderador'.$mod], $create);

		echo "Creando sala # " . $j . " en el moderador ". $mod . "\r\n";
	}
}

print_r($public['status']['@attributes']['code']);*/