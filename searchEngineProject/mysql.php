<?php





//$conn = mysqli_connect("localhost", "ezcom_ezcom", "Clover!135792468", "ezcom_maps" );



$GLOBALS['conn'] = mysqli_connect("localhost", "root", "", "search_engine" );

if(!$GLOBALS['conn']) {
	die('could not connect the server please try again later' . mysqli_error());
}





?>