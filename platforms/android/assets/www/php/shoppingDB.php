<?php
        include("dbConnect.php");
            $id = $_POST['main_id'];
            $a= $_POST['a'];
            $b= $_POST['b'];
            $c= $_POST['c'];
            $d= $_POST['d'];


            $sql = "INSERT INTO ShoppingTest (_id,a,b,c,d) VALUES ('$id','$a','$b','$c','$d');";

            if(mysqli_query($link,$sql)){
                echo "성공";
                echo("<script> location.replace('http://byeongkwan.dothome.co.kr/order.html');</script>");
            } else{
                echo "실패";
            }
?>