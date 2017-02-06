<?php
        include("dbConnect.php");
        mysqli_query($link,"set names utf8");
        $email= $_POST['email'];
        $name= $_POST['name'];
        $id= $_POST['id'];
        $pwd= $_POST['pwd'];
        $phone= $_POST['phone'];
        $addr= $_POST['addr'];

                $sql = "INSERT INTO LoginInfo (_id,_name,_pwd,_addr,_mail,_phone, _logMethod) VALUES ('$id','$name','$pwd','$addr','$email','$phone','facebook');";

                if(mysqli_query($link,$sql) ){
                    echo("<script>location.replace('http://byeongkwan.dothome.co.kr/main.html');</script>");
                    mysqli_close($link);
                    } else{
                            echo  mysqli_error($link);
                           }
?>