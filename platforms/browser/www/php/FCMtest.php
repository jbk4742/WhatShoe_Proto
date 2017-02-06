<?
header("Access-Control-Allow-Origin: *");

function send_notification ($tokens, $message){
$url = 'https://fcm.googleapis.com/fcm/send';

  $fields = array(
    'registration_ids' => $tokens,
    'notification' => array(
                    "title" => "push_test",
                    "body" => $message,
                    "icon" => "name_of_icon" ),
    'data' => array(
           "Nick" => "byeongkwan",
           "Room" => "test")
   );

	$headers = array(
		'Authorization:key = AAAAZl6ej20:APA91bFPUz3f0jYHDrHZf9sE5eRVyBeKexzmdUMPIq6tIG3V3-bqc7QttwiKVwNManmBfuMR9UMaIu8BeIUQujn7iKhvkFA9S7cGAlcVMHXH-omZs-Yfl20nYhEm4zWOeZ9KyzZNeTia',
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
/*	include_once 'config.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	$sql = "Select Token From users";

	$result = mysqli_query($conn,$sql);*/
	$tokens = array();
	$tokens[0] = "dgQAMP1h_8c:APA91bGJ_4RzANTLj38NsKiwV4FpuCZ78Nnrn4aYGQDtMe-g6JGe6NPbqcYdpC5hdlt3eIPvWC9blv0jz6JQrm6-pUiouwDz30wJNG_kmuFRTaJVS-Hj7HniI6DVMa4bceC2lgtUVtfD";
/*	if(mysqli_num_rows($result) > 0 ){

		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["Token"];
		}
	}*/

//	mysqli_close($conn);

//      $myMessage = $_POST['message'];
        $message = "aaaa";
/*	if ($myMessage == ""){
		$myMessage = "새글이 등록되었습니다.";
	}*/

$message = iconv("euc-kr","utf-8",$message) ;
$message = array("message" => "입력 메시지");
$message_status = send_notification($tokens, $message);
 echo $message_status;
?>
