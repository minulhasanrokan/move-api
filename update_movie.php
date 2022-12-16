<?php

	// set header..
	header("Content-Type: Application/json");

	//include db function....
	require_once("db_connection.php");

	// declare response array....
	$response = array();

	// check update request ...

	if(isset($_POST['update_movie'])){

		$id 			= $_POST['id'];
		////$title 			= $_POST['title'];
		$story_line 	= $_POST['story_line'];
		////$lang 			= $_POST['lang'];
		////$genre 			= $_POST['genre'];
		//$release_date 	= $_POST['release_date'];
		$box_office 	= $_POST['box_office'];
		//$run_time 		= $_POST['run_time'];
		$starts 		= $_POST['starts'];

		// update movie sql by id....
		$sql = "update from movies set story_line='$story_line', box_office='$box_office', starts='$starts' where id=$id";

		$update_movie_by_id = $con->query($sql);

		if($update_movie_by_id){
			$response['error'] = false;
			$response['message'] = "Movie Updated Successfully";
			$response['response_code'] = 200;
		}
		else{

			$response['error'] = true;
			$response['message'] = "Movie Does Not Updated Successfully";
			$response['response_code'] = 400;
		}

	}
	else{

		$response['error'] = true;
		$response['message'] = "Please Provide Valid Data";
		$response['response_code'] = 400;
	}

	echo json_encode($response);