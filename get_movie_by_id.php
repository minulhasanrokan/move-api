<?php

	// set header..
	header("Content-Type: Application/json");

	//include db function....
	require_once("db_connection.php");

	// declare response array....
	$response = array();

	// check id ...

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		// select all movie sql by id....
		$sql = "select * from movies where id='$id'";

		$all_movie_by_id = $con->query($sql);

		if($all_movie_by_id){

			$movies = array();

			while ($row= $all_movie_by_id->fetch_array()) {
				
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
	}
	else{

		$response['error'] = true;
		$response['movies'] = '';
		$response['message'] = "Please Provide Movie Id";
		$response['response_code'] = 400;
	}

	echo json_encode($response);
?>