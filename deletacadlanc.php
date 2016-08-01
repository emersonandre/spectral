<?php session_start();
	$user = $_SESSION['id'];

	$id = $_POST['id'];


	$host = "localhost";
	$usuario = "master";
	$senhabd = "145819";
	$banco = "financas";

		// Create connection
		$conn = mysqli_connect($host, $usuario, $senhabd, $banco);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "DELETE FROM lancamentos WHERE id = '$id' and id_user='$user'";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);