<?php

	// set header..
	header("Content-Type: Application/json");

	//include db function....
	require_once("db_connection.php");

	// declare response array....
	$response = array();

	// check title ...

	if(isset($_GET['title'])){

		$title = $_GET['title'];

		// select all movie sql by title....
		$sql = "select * from movies where title='$title'";

		$all_movie_by_title = $con->query($sql);

		if($all_movie_by_title){

			$movies = array();

			while ($row= $all_movie_by_title->fetch_array()) {
				
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
		$response['message'] = "Please Provide Movie Title";
		$response['response_code'] = 400;
	}

	echo json_encode($response);
?>