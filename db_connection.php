<?php
	

	//error control...

	//error_reporting(0);

	// database credential.....

	$db_name 		= 'movie_api';
	$db_user_name 	= 'root';
	$db_pass 		= '';
	$db_server_name = 'localhost';

	// database connection....

	$con = mysqli_connect($db_server_name,$db_user_name,$db_pass,$db_name);

	// check connection....

	if($con==false){

		echo "{'message':'Unable To Connect To Database'}";
		die();
	}
	else{

		//echo "{'message':'Connected To Database Successfully'}";
		//die();
	}


?>