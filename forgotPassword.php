<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Password reset</title>
</head>
<body class="forms">
    <div class="row justify-content-center">
        <div class="col-sm-4 card login">
            <div class="card-body">
                <a href="index.php" class="float-right btn btn-outline-primary">Sign in</a>
                <h4 class="card-title mb-4 mt-1">Password reset</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="sword">Security word:</label>
                        <input class="form-control" type="text" name="sword" id="sword" placeholder="Security word">
                        <div id="wordmsg"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="********">
                        <div id="validpassmsg"></div>
                    </div>
                    <div class="form-group">
                        <label for="repassword">Repeat password:</label>
                        <input class="form-control" type="password" name="repassword" id="repassword" placeholder="********">
                        <div id="passmsg"></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" id="rpswd" type="button">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="resetPassword.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>