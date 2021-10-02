<?php
    require_once "connect.php";
    $id = $_GET['warehouse_id'];
    $sql = "SELECT warehouse_name,warehouse_detail,warehouse_image,warehouse_max,warehouse_used FROM warehouse WHERE warehouse_id='$id'";
    $query = $db->query($sql);
    while($row = $query->fetch_assoc()){
        $image = $row['warehouse_image'];
        $name = $row['warehouse_name'];
        $max = $row['warehouse_max'];
        $detail = $row['warehouse_detail'];
        $used = $row['warehouse_used'];
        $cubeLeft = $row['warehouse_max']-$row['warehouse_used'];
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
           
            <li class="nav-item active">
                <a class="nav-link" href="warehouse.php">Warehouse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addproduct.php">Import Product</a>
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
            <div class="col-8">
                <?php echo "<img src='images/".$image."' width='400'>"; ?>
            </div>
        </div><br>
        <div class="row justify-content-center">
            <div class="col-8">
                <h4>ชื่อโกดังสินค้า : <?php echo $name; ?></h4>
            </div>
        </div><br>
        <div class="row justify-content-center">
            <div class="col-8">
                <p style="text-indent: 2.5em;"><?php echo $detail; ?></p>
            </div>
        </div><br>
        <div class="row justify-content-center">
            <div class="col-8">
                <p>พื้นที่เก็บสินค้าทั้งหมด <b><?php echo $max; ?></b> ลูกบาศก์เมตร</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <p>ใช้พื้นที่ไปแล้ว <b><?php echo $used; ?></b> ลูกบาศก์เมตร</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <p>เหลือพื้นที่สำหรับเก็บสินค้าอีก <b><?php echo $cubeLeft; ?></b> ลูกบาศก์เมตร</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <button id="btn-back" class="btn btn-primary">Back</button>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btn-back").click(function(){
                $(location).attr('href', 'warehouse.php');
            })
        })
    </script>
</body>
</html>