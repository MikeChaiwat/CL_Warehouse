<?php
    require_once "connect.php";
   
    if(isset($_GET['product_id'])){
        $p_id = $_GET['product_id'];
        $sql = "SELECT * FROM product JOIN warehouse ON product.warehouse_id = warehouse.warehouse_id WHERE product_id = '$p_id'";

        $query = $db->query($sql);
        $query2 = $db->query($sql);
    }else{
        $sql = "SELECT * FROM product JOIN warehouse ON product.warehouse_id = warehouse.warehouse_id";
        $query = $db->query($sql);
    }



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
    <title>Document</title>
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
            <li class="nav-item ">
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <p><h2>ส่งออกสินค้า</h2></p>
                <form id="addExport" method="post">
                    <div class="form-group">
                        <table class="table table-bordered">
                            <tr>
                                <td align="right">เลือกสินค้า :</td>
                                <td><select name="expProduct" class="form-control">
                                <?php 
                                    while($row = $query->fetch_assoc()){
                                ?>
                                    <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']." ".$row['product_name']; ?></option>
                                    
                                <?php
                                    $qty = $row['product_qty'];
                                    }
                                ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td align="right">จำนวน (ลูกบาศก์เมตร) :</td>
                                <td><input type="number" name="expQty" class="form-control" min=0 max=<?php echo $qty; ?>></td>
                            </tr>
                            <tr>
                                <td align="right">วันที่ส่งออก : </td>
                                <td><input type="date" name="expDate" class="form-control"></td>
                            </tr>
                            <tr>
                                <td align="right">จากคลังสินค้า :</td>
                                <td><select name="expStore" class="form-control">
                                <?php 
                                    while($row = $query2->fetch_assoc()){
                                ?>
                                    <option value="<?php echo $row['warehouse_id']; ?>"><?php echo $row['warehouse_id']." ".$row['warehouse_name']; ?></option>
                                <?php
                                    }
                                ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" id="btnExp" class="btn btn-success"></td>
                            </tr>
                        </table>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/insert2.js"></script>
</body>
</html>
