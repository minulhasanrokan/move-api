<?php

	// set header..
	header("Content-Type: Application/json");

	//include db function....
	require_once("db_connection.php");

	// declare response array....
	$response = array();

	// check delete request ...

	if(isset($_GET['delete_movie'])){

		$id 			= $_GET['id'];

		// delete movie sql by id....
		$sql = "delete from movies  where id=$id limit 1";

		$delete_movie_by_id = $con->query($sql);

		if($delete_movie_by_id){
			$response['error'] = false;
			$response['message'] = "Movie Deleted Successfully";
			$response['response_code'] = 200;
		}
		else{

			$response['error'] = true;
			$response['message'] = "Movie Does Not Deleted Successfully";
			$response['response_code'] = 400;
		}

	}
	else{

		$response['error'] = true;
		$response['message'] = "Please Provide Valid Data";
		$response['response_code'] = 400;
	}

	echo json_encode($response);