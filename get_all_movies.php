<?php

	// set header..
	header("Content-Type: Application/json");

	//include db function....
	require_once("db_connection.php");

	// select all movie sql....
	$sql = "select * from movies";

	$all_movies = $con->query($sql);

	$response = array();

	if($all_movies){

		$movies = array();

		while ($row= $all_movies->fetch_array()) {
			
			$movies[] = $row;
		}

		$response['error'] = false;
		$response['movies'] = $movies;
		$response['message'] = "Movie Return Successfully";
		$response['response_code'] = 200;

		$con->close();
	}
	else{

		$response['error'] = true;
		$response['movies'] = '';
		$response['message'] = "Movie Does Not Return Successfully";
		$response['response_code'] = 400;
	}	

	echo json_encode($response);

?>