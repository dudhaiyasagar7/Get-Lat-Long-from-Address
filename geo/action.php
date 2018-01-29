<?php 

	require 'location.php';
	$loc = new location;
	$loc->setId($_REQUEST['id']);
	$loc->setLat($_REQUEST['lat']);
	$loc->setLng($_REQUEST['lng']);
	$status = $loc->updateBlankLocations();

	if($status == true){
		echo "Updated.";
	} else {
		echo "Failed.";
	}

 ?>