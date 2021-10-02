<?php
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
        
            <li class="nav-item active">
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
            <div class="col-6 text-center" style="margin-top:30px;">
                <h4>กราฟเส้นการนำเข้าสินค้า </h4>
            </div>
            <div class="col text-center" style="margin-top:30px;">
                <canvas id="myChart" width="800px" height="300px"></canvas>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 text-center" style="margin-top:30px;">
                <h4>กราฟเส้นการส่งออกสินค้า </h4>
            </div>
            <div class="col text-center" style="margin-top:30px;">
                <canvas id="expChart" width="800px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/Chart.bundle.js"></script>
    <?php
        
        require_once "connect.php";
        $sqlt1 = "SELECT SUM(product_qty) AS total, DATE_FORMAT(time, '%b') AS time FROM product WHERE type_id='1' GROUP BY DATE_FORMAT(time, '%b%') ORDER BY DATE_FORMAT(time, '%m%') ";
        $queryChart1 = $db->query($sqlt1);
        $date1 = array();
        $qty1 = array();
        while($rs = $queryChart1->fetch_assoc()){ 
            $date1[] = "\"".$rs['time']."\""; 
            $qty1[] = "\"".$rs['total']."\""; 
        }
        $date1 = implode(",", $date1);
        $qty1 = implode(",", $qty1);
        //===============================================
        $sqlt2 = "SELECT SUM(product_qty) AS total, DATE_FORMAT(time, '%b') AS time FROM product WHERE type_id='2' GROUP BY DATE_FORMAT(time, '%b%') ORDER BY DATE_FORMAT(time, '%m%') ";
        $queryChart2 = $db->query($sqlt2);
        
        $qty2 = array();
        while($rs = $queryChart2->fetch_assoc()){ 
            $date2[] = "\"".$rs['time']."\""; 
            $qty2[] = "\"".$rs['total']."\""; 
        }
 
        
        $qty2 = implode(",", $qty2);
        //===============================================
        $sqlt3 = "SELECT SUM(product_qty) AS total, DATE_FORMAT(time, '%b') AS time FROM product WHERE type_id='3' GROUP BY DATE_FORMAT(time, '%b%') ORDER BY DATE_FORMAT(time, '%m%') ";
        $queryChart3 = $db->query($sqlt3);
        
        $qty3 = array();
        while($rs = $queryChart3->fetch_assoc()){ 
            $date3[] = "\"".$rs['time']."\""; 
            $qty3[] = "\"".$rs['total']."\""; 
        }
 
        
        $qty3 = implode(",", $qty3);
        //===============================================
        $sqlt4 = "SELECT SUM(product_qty) AS total, DATE_FORMAT(time, '%b') AS time FROM product WHERE type_id='4' GROUP BY DATE_FORMAT(time, '%b%') ORDER BY DATE_FORMAT(time, '%m%') ";
        $queryChart4 = $db->query($sqlt4);
        
        $qty4 = array();
        while($rs = $queryChart4->fetch_assoc()){ 
         
            $qty4[] = "\"".$rs['total']."\""; 
        }
 
        
        $qty4 = implode(",", $qty4);
        //===============================================
        $sqle1 = "SELECT SUM(export_qty) AS total, DATE_FORMAT(exportproduct.time, '%b') AS time FROM exportproduct ".
                "JOIN product ON exportproduct.product_id = product.product_id ".
                "WHERE type_id='1' GROUP BY DATE_FORMAT(exportproduct.time, '%b%') ORDER BY DATE_FORMAT(exportproduct.time, '%m%')";
        
        $queryExp1 = $db->query($sqle1);
        $dateExp = array();
        $expQty1 = array();
        while($rs = $queryExp1->fetch_assoc()){ 
            $dateExp[] = "\"".$rs['time']."\""; 
            $expQty1[] = "\"".$rs['total']."\""; 
        }
        $dateExp = implode(",", $dateExp);
        $expQty1 = implode(",", $expQty1);
        //================================================
        $sqle2 = "SELECT SUM(export_qty) AS total, DATE_FORMAT(exportproduct.time, '%b') AS time FROM exportproduct ".
                "JOIN product ON exportproduct.product_id = product.product_id ".
                "WHERE type_id='2' GROUP BY DATE_FORMAT(exportproduct.time, '%b%') ORDER BY DATE_FORMAT(exportproduct.time, '%m%')";
        
        $queryExp2 = $db->query($sqle2);
    
        $expQty2 = array();
        while($rs = $queryExp2->fetch_assoc()){ 
        
            $expQty2[] = "\"".$rs['total']."\""; 
        }
 
        $expQty2 = implode(",", $expQty2);
        //================================================
        $sqle3 = "SELECT SUM(export_qty) AS total, DATE_FORMAT(exportproduct.time, '%b') AS time FROM exportproduct ".
        "JOIN product ON exportproduct.product_id = product.product_id ".
        "WHERE type_id='3' GROUP BY DATE_FORMAT(exportproduct.time, '%b%') ORDER BY DATE_FORMAT(exportproduct.time, '%m%')";

        $queryExp3 = $db->query($sqle3);
        $expQty3 = array();
        while($rs = $queryExp3->fetch_assoc()){ 

            $expQty3[] = "\"".$rs['total']."\""; 
        }

        $expQty3 = implode(",", $expQty3);
    //================================================
        $sqle4 = "SELECT SUM(export_qty) AS total, DATE_FORMAT(exportproduct.time, '%b') AS time FROM exportproduct ".
        "JOIN product ON exportproduct.product_id = product.product_id ".
        "WHERE type_id='4' GROUP BY DATE_FORMAT(exportproduct.time, '%b%') ORDER BY DATE_FORMAT(exportproduct.time, '%m%')";

        $queryExp4 = $db->query($sqle3);
        $expQty4 = array();
        while($rs = $queryExp4->fetch_assoc()){ 

            $expQty4[] = "\"".$rs['total']."\""; 
        }
        $expQty4 = implode(",", $expQty4);
    //================================================
    ?>
    <script type="text/javascript">
    var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:[<?php echo $date1;?>
            
                ],
                datasets: [{
                    label: ['เครื่องดื่ม'],
                    data: [ <?php echo $qty1;?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    
                },{
                    label: ['เสื้อผ้า'],
                    data: [<?php echo $qty2 ?>
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: ['รองเท้า'],
                    data: [<?php echo $qty3 ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: ['หนังสือ'],
                    data: [<?php echo $qty4 ?>
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }
                ],
                
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        
    </script> 
    <script type="text/javascript">
    var ctx2 = document.getElementById("expChart").getContext('2d');
        var expChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels:[<?php echo $dateExp;?>
            
                ],
                datasets: [{
                    label: ['เครื่องดื่ม'],
                    data: [ <?php echo $expQty1;?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    
                },{
                    label: ['เสื้อผ้า'],
                    data: [ <?php echo $expQty2;?>
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: ['รองเท้า'],
                    data: [ <?php echo $expQty3;?>
                    ],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: ['หนังสือ'],
                    data: [ <?php echo $expQty4;?>
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }
                ],
                
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        //-------------------EXPORT GRAPH------------------------
        
    </script> 
</body>
</html>