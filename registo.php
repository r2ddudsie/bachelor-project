<?php
	//starting the session
	session_start();

	//including the database connection
	require_once 'conn.php';
	
	if(ISSET($_POST['register'])){
		// Setting variables
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		// Insertion Query
		$query = "INSERT INTO `member` (username, password, firstname, lastname) VALUES(:username, :password, :firstname, :lastname)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param(':username', $username);
		$stmt->bind_param(':password', $password);
		
		
		// Check if the execution of query is success
		if($stmt->execute()){
			//setting a 'success' session to save our insertion success message.
			$_SESSION['success'] = "Registo efetuado com sucesso";

			//redirecting to the index.php 
			header('location: principal.php');
		}

	}
