<?php

	// set header..
	header("Content-Type: Application/json");

	//include db function....
	require_once("db_connection.php");

	// declare response array....
	$response = array();

	// check create request ...

	if(isset($_POST['create_movie'])){

		//$id 			= $_POST['id'];
		$title 			= $_POST['title'];
		$story_line 	= $_POST['story_line'];
		$lang 			= $_POST['lang'];
		$genre 			= $_POST['genre'];
		$release_date 	= $_POST['release_date'];
		$box_office 	= $_POST['box_office'];
		$run_time 		= $_POST['run_time'];
		$starts 		= $_POST['starts'];

		// create movie sql....

		$sql = "insert into movies (title, story_line, lang, genre, release_date, box_office, run_time, starts) values ('$title', '$story_line', '$lang', '$genre', '$release_date', '$box_office', '$run_time', '$starts')";

		$create_movie = $con->query($sql);

		if($create_movie){
			$response['error'] = false;
			$response['message'] = "Movie Created Successfully";
			$response['response_code'] = 200;
		}
		else{

			$response['error'] = true;
			$response['message'] = "Movie Does Not Created Successfully";
			$response['response_code'] = 400;
		}

	}
	else{

		$response['error'] = true;
		$response['message'] = "Please Provide Valid Data";
		$response['response_code'] = 400;
	}

	echo json_encode($response);