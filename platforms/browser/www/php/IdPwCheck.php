<?php
    include("dbConnect.php");
    $id= $_POST['login_id'];
    $pwd= $_POST['login_pw'];
    mysqli_query($link,"set names utf8");

    $sql = "SELECT * FROM AdminLog WHERE _id='$id'AND _pw='$pwd';";
    $sql = mysqli_query($link,$sql);
    $sql = mysqli_num_rows($sql);
    if($sql){
    echo "성공1";
        echo("<script>location.replace('http://byeongkwan.dothome.co.kr/admin.html');</script>");
        echo "성공1";
    } else{
            $sql = "SELECT * FROM LoginInfo WHERE _id='$id'AND _pwd='$pwd';";
            $sql = mysqli_query($link,$sql);
            $sql = mysqli_num_rows($sql);
            if($sql){
                    echo("<script>location.replace('http://byeongkwan.dothome.co.kr/main.html');</script>");
                    echo "성공2";
            } else{
                echo "실패";
            }
    }
?>