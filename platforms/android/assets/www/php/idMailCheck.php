<?php
        include("dbConnect.php");
        $email= $_POST['email'];
        $name= $_POST['name'];
        $id= $_POST['id'];
        $pwd= $_POST['pwd'];
        $phone= $_POST['phone'];
        $addr= $_POST['addr'];

        $sql_id = "SELECT _id FROM LoginInfo WHERE _id='".$id."';";
        $sql_mail = "SELECT _mail FROM LoginInfo WHERE _mail='".$email."';";

        $result_id = mysqli_query($link,$sql_id);
        $result_mail = mysqli_query($link,$sql_mail);

        $count_id = mysqli_num_rows($result_id);
        $count_mail = mysqli_num_rows($result_mail);

        if($count_id == 1 || $count_mail == 1 )
        {
            echo "아이디 또는 이메일 중복이 있습니다";
        } else {
           $sql = "INSERT INTO LoginInfo (_id,_name,_pwd,_addr,_mail,_phone, _logMethod) VALUES ('$id','$name','$pwd','$addr','$email','$phone', 'original');";
           mysqli_query($link,$sql);
           mysqli_close($link);
           echo "성공";
           //echo("<script>location.replace('/');</script>");
        }

?>