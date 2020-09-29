<?php
    require "./controller/DbHandler.php";
    use db\DbHandler;

    $db = new DbHandler();

    session_start();

    if ($_SESSION["user"] == null) {
        header("Location: ./index.php");
    }

    $sql = "SELECT * FROM beers ORDER BY likes DESC";

    $result = $db->select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style/style.css">
    <title>Beer-o-meter</title>
</head>
<body class="normal">
    <div class="row justify-content-center">
        <div class="col-8 navig">
            <nav class="navbar navbar-expand-lg navbar-dark nav-img justify-content-center">
                <div>
                    <ul class="navbar-nav">
                        <?php if ($db->select("SELECT * FROM users WHERE username = '{$_SESSION["user"]}'")->fetch_assoc()["admin"] == 1) { 
                        echo "<li class='nav-item active insideNav'>";
                            echo "<a href='addBeer.php' class='nav-link'>Add beer</a>";
                        echo "</li>";
                        } ?>
                        <li class="nav-item active insideNav">
                            <a href="profile.php" class="nav-link">My Profile (<?php echo $_SESSION["user"]; ?>)</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <?php
        if($result->num_rows > 0) {
            $rating = 1;
            while($row = $result->fetch_assoc()) {
                $username = $_SESSION["user"];
                $sql = "SELECT * FROM users WHERE username = '{$username}'";
                $resultId = $db->select($sql);
                $rowId = $resultId->fetch_assoc();

                $sql = "SELECT * FROM votes WHERE uid = '{$rowId["id"]}' AND bid = '{$row['id']}'";
                if(($db->select($sql))->fetch_assoc() == null) {
                    $btnLike = "Like it";
                } else {
                    $btnLike = "Unlike it";
                }

                echo "<div class='row justify-content-center'>";
                    echo "<div class='col-8 card'>";
                        echo "<div class='card-body'>";
                            echo "<div>";
                                echo "<p class='articleBeerName'>".$rating.". ".$row["name"]."</p>";
                            echo "</div>";
                            echo "<div id='postImg".$row['id']."'>";
                                echo "<img id='imageCard' class='postImg' src='uploads/".$row["path"]."'>";
                                echo "<p class='card-text'>".$row["info"]."</p>";
                            echo "</div>";
                            echo "<div>";
                                echo "<p class='articleLikes'><span id='likeCounter".$row['id']."'>".$row["likes"]."</span> likes</p>";
                                echo "<button type='button' onclick='likeHandler()' class='float-right btn btn-primary'><span id='btnText".$row['id']."'>".$btnLike."</span></button>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                $rating += 1;
            }
        }
    ?>
    <script src="js/homepage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>