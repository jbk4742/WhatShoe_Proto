<?php
	include("dbConnect.php");
	include_once 'config.php';
	define("GOOGLE_API_KEY", "AAAAZl6ej20:APA91bFPUz3f0jYHDrHZf9sE5eRVyBeKexzmdUMPIq6tIG3V3-bqc7QttwiKVwNManmBfuMR9UMaIu8BeIUQujn7iKhvkFA9S7cGAlcVMHXH-omZs-Yfl20nYhEm4zWOeZ9KyzZNeTia");
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $message
			);

		$headers = array(
			'Authorization:key =' . GOOGLE_API_KEY,
			'Content-Type: application/json'
			);

	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}


	//데이터베이스에 접속해서 토큰들을 가져와서 FCM에 발신요청


	$sql = "Select Token From fcm";

	$result = mysqli_query($link,$sql);
	$tokens = array();

	if(mysqli_num_rows($result) > 0 ){

		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["Token"];
		}
	}

	mysqli_close($link);

        $myMessage = $_POST['message']; //폼에서 입력한 메세지를 받음
	if ($myMessage == ""){
		$myMessage = "새글이 등록되었습니다.";
	}

	$message = array("message" => $myMessage);
	$message_status = send_notification($tokens, $message);
	echo $message_status;

 ?>
