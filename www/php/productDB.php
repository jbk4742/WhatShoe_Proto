<?php
        include("dbConnect.php");

                $sql="select _id from Shopping";
                $result=mysqli_query($link,$sql);
                $row = array();
                echo '주문고객' ;
                $i = 0;
            	while($row=mysqli_fetch_array($result)){
                    $id[$i] = $row[_id];
                    $i += 1;
            	}
?>
