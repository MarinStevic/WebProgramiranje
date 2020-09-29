<?php
    require "./controller/DbHandler.php";
    use db\DbHandler;

    $db = new DbHandler();

    session_start();

    if ($_SESSION["user"] != null) {
        $sql = "SELECT * FROM users WHERE username = '".$_SESSION["user"]."'";
        $result = $db->select($sql)->fetch_assoc();
        if ($result["admin"] == 0) {
            header("Location: ./home.php");
        }
    }
    else {
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New beer</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
</head>
<body>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <div class="container">
        <div class="row">
            <div class="col-sm-2 text-left">
                <a href="home.php" class="btn btn-link">Go Back</a>
            </div>
            <div class="w-100"></div>
            <div class="col-sm-10 p-3">
                <h2>BEER-O-METER ADD NEW BEER</h2>
            </div>
            <div class="w-100"></div>
            <div class="d-flex flex-column  align-items-start side col p-4">
                <div class="row d-flex justify-content-start">
                    <div class="col-auto">
                        <div>
                            <form id="beerForm" name="beerForm" action="./controller/db/addBeer.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Beer name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" maxlength="63" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="info" class="col-sm-4 col-form-label">Beer info</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="info" name="info" maxlength="511">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label">Beer image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif" onchange="loadFile(event)"><br>
                                        <img id="output" style="max-width: 60%;">
                                    </div>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-success" id="submitInput">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>