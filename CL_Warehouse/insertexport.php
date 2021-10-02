<?php
    header("Content-Type:application/json");
    require_once "connect.php";
    $id_p = $_REQUEST['expProduct'];
    $qty = $_REQUEST['expQty'];
    $date = $_REQUEST['expDate'];
    $store = $_REQUEST['expStore'];
    $sql = "INSERT INTO exportproduct ".
            "VALUES ('','$id_p','$qty','$date','$store')";
    $query = $db->query($sql);
    
    $sql2 = "UPDATE product SET product_qty = product_qty-$qty WHERE product_id = $id_p";
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