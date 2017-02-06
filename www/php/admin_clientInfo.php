<?php
        include("dbConnect.php");
        $id= $_POST['clientInfo_id'];
        $i = 6;
        $sql="select  _id, _name, _mail, _phone, _addr, _logMethod from LoginInfo WHERE _id='$id';";
        $result=mysqli_query($link,$sql);
        $row = array();
        $row=mysqli_fetch_array($result);

        echo "<h3>회원 정보</h3><br>";
        echo("<style>
                    table{
                        width: 100%;
                        height: 500px;
                    }
                    th, td {
                        border: 1px solid #bcbcbc;
                        text-align: center;
                    }
        </style>");
        $coment = array('아이디','이름', '메일', '폰번호', '주소', '가입방법');
        echo("<table> <tr><th>list</th><th>data</th></tr>");
        for($j = 0 ; $j < $i ; $j+=1){
            echo("<tr><td>$coment[$j]</td><td>$row[$j]</td></tr>");
        }
        echo("</table");
?>