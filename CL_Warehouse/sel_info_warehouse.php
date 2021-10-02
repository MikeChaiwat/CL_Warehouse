<?php
    header("Content-Type:application/json");
    require_once "Connect.php";
    $sql = "SELECT warehouse_id,warehouse_name,warehouse_place,warehouse_image,zone_name ".
            "FROM warehouse JOIN zone ON warehouse.zone_id = zone.zone_id";
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