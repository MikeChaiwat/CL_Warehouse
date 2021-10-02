<?php
    require_once "connect.php";
    $sql = "SELECT * FROM product ";
    $query = $db->query($sql);

    if(session_status()!= PHP_SESSION_ACTIVE){
        session_start();
    }
   
    if(!isset($_SESSION['username'])){
        header('Location:Login.php');
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage CL Warehouse</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="warehouse.php">CL Warehouse .Ltd</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
           
            <li class="nav-item">
                <a class="nav-link" href="warehouse.php">Warehouse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addproduct.php">Import Product</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="product.php">Product</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="graph.php">Statistics</a>
            </li>
            </ul>
            <span class="navbar-text">
                <font color="white" style="margin-right:20;">ชื่อผู้ใช้ : <?php echo $_SESSION['username']; ?></font> 
            </span>
            <span class="navbar-text">
                <form action="Destroy_session.php" method="post"><button id="clr-session" class="btn btn-sm btn-outline-danger">Logout</button></form>
            </span>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div> <h4>ตารางสินค้า</h4></div>
                <div class="records-content"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคลังสินค้า</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="warehouse.php" id="formWarehouse" method="post" enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>ชื่อคลังสินค้า :</td>
                        <td><input type="text" name="whName" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>ที่อยู่คลังสินค้า : </td>
                        <td><input type="text" name="whPlace" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>โซน : </td>
                        <td><select name="whZone" class="form-control">
                        <?php
                            while($row = $query->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row['zone_id'] ?>"><?php echo $row['zone_name'] ?></option>
                        <?php
                            }    
                        ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td>รูปภาพคลังสินค้า : </td>
                        <td><input type="file" name="image" id="image" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>รายละเอียด : </td>
                        <td><textarea name="whDetail" rows="5" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td>ความจุคลังสินค้า <br>(ลูกบาศก์เมตร) : </td>
                        <td><input type="text" name="whMax" class="form-control"></td>
                    </tr>
                </table>
                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-outline-success" value="Save changes">
        </div>
        </form>
        </div>
    </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/product.js"></script>
</body>
</html>

<?php
/*
    error_reporting(0);
    $name = $_REQUEST['whName'];
    $place = $_REQUEST['whPlace'];
    $zone = $_REQUEST['whZone'];
    $detail = $_REQUEST['whDetail'];
    $max = $_REQUEST['whMax'];
    $ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $imgName = "Warehouse-".uniqid().".$ext";
    $sql = "INSERT INTO warehouse ".
        "VALUES ('','$name','$place','$imgName','$detail',0,'$max','$zone')";
    if(isset($name)){
        $query = $db->query($sql);
    }
    
    if($query){
        $imageTemp = $_FILES["image"]["tmp_name"];
        copy($imageTemp,"images/".$imgName."");
       
    }
*/
?>