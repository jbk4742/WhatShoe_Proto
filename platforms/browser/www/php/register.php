<?php
    include("dbConnect.php");
    define("GOOGLE_API_KEY", "AAAAZl6ej20:APA91bFPUz3f0jYHDrHZf9sE5eRVyBeKexzmdUMPIq6tIG3V3-bqc7QttwiKVwNManmBfuMR9UMaIu8BeIUQujn7iKhvkFA9S7cGAlcVMHXH-omZs-Yfl20nYhEm4zWOeZ9KyzZNeTia");


    if(isset($_POST["Token"])){

    		$token = $_POST["Token"];
    		//데이터베이스에 접속해서 토큰을 저장
    		include_once 'config.php';
    		$query = "INSERT INTO fcm (Token) Values ('$token') ON DUPLICATE KEY UPDATE Token = '$token'; ";
    		mysqli_query($link, $query);

    		mysqli_close($link);
    	}
?>