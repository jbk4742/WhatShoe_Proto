<?php
        include("dbConnect.php");
        $id= $_POST['id'];

        $sql_id = "SELECT _id FROM LoginInfo WHERE _id='".$id."';";
        $result_id = mysqli_query($link,$sql_id);
        $count_id = mysqli_num_rows($result_id);

        if($count_id){
            echo("<script> location.replace('http://byeongkwan.dothome.co.kr/main.html');</script>");
        }else{
            echo("<script> location.replace('http://byeongkwan.dothome.co.kr/join_FB.html');</script>");
        }
?>