<?php
    require_once "connect.php";
    $sql = "SELECT * FROM typeproduct";
    $query = $db->query($sql);
    $sql2 = "SELECT warehouse_id,warehouse_name FROM warehouse";
    $query2 = $db->query($sql2);
   
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
            <li class="nav-item active">
                <a class="nav-link" href="addproduct.php">Import Product</a>
            </li>
            <li class="nav-item">
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
                <p><h2>นำเข้าสินค้า</h2></p>
                <form id="addProduct" method="post">
                    <div class="form-group">
                        <table class="table table-bordered">
                            <tr>
                                <td align="right">ชื่อสินค้า : </td>
                                <td><input name="nameProduct" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td align="right">ประเภทสินค้า : </td>
                                <td><select name="typeProduct" class="form-control">
                                <?php
                                    while($row = $query->fetch_assoc()){
                                ?>
                                        <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
                                <?php
                                    }
                                ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td align="right">จำนวน (ลูกบาศก์เมตร) : </td>
                                <td><input name="qtyProduct" type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td align="right">วันที่นำเข้า : </td>
                                <td><input type="date" name="dateProduct" class="form-control"></td>
                            </tr>
                            <tr>
                                <td align="right">คลังเก็บสินค้า : </td>
                                <td><select name="storeProduct" class="form-control">
                                <?php
                                    while($row = $query2->fetch_assoc()){
                                ?>
                                        <option value="<?php echo $row['warehouse_id'] ?>">
                                        <?php echo $row['warehouse_id']." ".$row['warehouse_name'] ?></option>
                                <?php
                                    }
                                ?>
                                </select></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" id="btnSend" class="btn btn-success"></td>
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