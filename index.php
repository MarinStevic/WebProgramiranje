<?php
    session_start();

    if ($_SESSION["user"] != null) {
        header("Location: ./home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body class="forms">
    <div class="row justify-content-center">
        <div class="col-sm-4 card login">
            <div class="card-body">
                <a href="registration.php" class="float-right btn btn-outline-primary">Sign up</a>
                <h4 class="card-title mb-4 mt-1">Sign in</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <!--a href="forgotPassword.php" class="float-right">Forgot?</a-->
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="********" required>
                        <div id="wrongPass"></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" id="login" type="button">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>