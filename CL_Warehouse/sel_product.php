<?php
    header("Content-Type:application/json");
    require_once "Connect.php";
    $sql = "SELECT * FROM product JOIN typeproduct ".
            "ON product.type_id = typeproduct.type_id JOIN warehouse ON product.warehouse_id = warehouse.warehouse_id";
    $query = $db->query($sql);
   if(!$query){
       printf("ERROR". $db->error);
       exit();
   }
   $resultArray = array();
   while($row = $query->fetch_array(MYSQLI_ASSOC) ){
        array_push($resultArray,$row);
   }
   $db->close();
   echo json_encode($resultArray);
?>