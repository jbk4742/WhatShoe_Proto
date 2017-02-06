<meta http-equiv="content-type" content="text/html" charset="utf-8">
<?php
        include("dbConnect.php");

                $sql="select _index, _id, _product, _order_date from Shopping";
                $result=mysqli_query($link,$sql);
                $row = array();
                $i = 0;
            	while($row=mysqli_fetch_array($result)){
            	    $index[$i] = $row[_index];
                    $id[$i] = $row[_id];
                    $product[$i] = $row[_product];
                    $date[$i] = $row[_order_date];
                    $i += 1;
            	}
?>
