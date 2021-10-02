<?php
    header("Content-Type:application/json");
    require_once "connect.php";
    $name = $_REQUEST['nameProduct'];
    $qty = $_REQUEST['qtyProduct'];
    $type = $_REQUEST['typeProduct'];
    $store = $_REQUEST['storeProduct'];
    $date = $_REQUEST['dateProduct'];
    $sql = "INSERT INTO product ".
            "VALUES ('','$name','$qty','$date',$type,$store)";
    $query = $db->query($sql);
    $sql2 = "UPDATE warehouse SET warehouse_used = warehouse_used+'$qty' WHERE warehouse_id = '$store'";
    $query2 = $db->query($sql2);

   if($query && $query2){
       echo json_encode(array(
           'status'=>'1',
           'message'=>'Record add Successfully '));
   }else{
       echo json_encode(array(
            'status'=>'0',
            'message'=>'Error insert data!'
       ));
   }
 
?>