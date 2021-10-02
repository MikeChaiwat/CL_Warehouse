
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background:url(images/background.jpg); 
            background-repeat: no-repeat;
            position : relative;
            background-size: cover;
        }
    </style>
</head>
<body> 
    <img class="bg" src="" alt="">
    <div class="container-sm" id="login" style="background-color:#e6f0ff; margin-top:10em;">
        <form action="LoginControl.php" method="post">
            <div class="row">
                <div class="col-4" id="bg-col"><h2>CL. Warehouse</h2></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4" id="bg-col"><h2>Login Form</h2></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4" id="bg-col">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="user">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4" id="bg-col">
                    <button class="btn btn-primary" id="btn-login">Login</button>
                 
                </div>
            </div>
           
        </form>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

