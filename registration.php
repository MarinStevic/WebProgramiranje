<?php
    session_start();

    $username = $_SESSION["user"];
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
    <title>Registration</title>
</head>
<body class="forms">
    <div class="row justify-content-center">
        <div class="col-sm-4 card login">
            <div class="card-body">
                <a href="login.html" class="float-right btn btn-outline-primary">Sign in</a>
                <h4 class="card-title mb-4 mt-1">Sign up</h4>
                <form id="registerForm" name="registerForm" action="./controller/db/register.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Name" maxlength="63" pattern=".{5,}" title="Five or more characters" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname:</label>
                        <input class="form-control" type="text" name="surname" id="surname" placeholder="Surname" maxlength="63" pattern=".{5,}" title="Five or more characters" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="63" pattern=".{5,}" title="Five or more characters" required>
                        <div id="usernamemasg"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Email" maxlength="63" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        <div id="emailmsg"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="********" maxlength="63" pattern=".{8,}" title="Eight or more characters" required>
                        <div id="validpassmsg"></div>
                    </div>
                    <div class="form-group">
                        <label for="repassword">Repeat password:</label>
                        <input class="form-control" type="password" name="repassword" id="confirm_password" placeholder="********" maxlength="63" pattern=".{8,}" title="Eight or more characters" required>
                        <div id="passmsg"></div>
                    </div>
                    <!--div class="form-group">
                        <label for="sword">Security word:</label>
                        <input class="form-control" type="text" name="sword" id="sword" placeholder="Security word">
                    </div-->
                    <input type="submit" value="Submit" class="btn btn-success" id="submitInput">
                </form>
            </div>
        </div>
    </div>
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>