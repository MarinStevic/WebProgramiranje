<?php
    require "./../DbHandler.php";
    use db\DbHandler;

    $db = new DbHandler();

    $id = $_POST["id"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $oldpassword = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];

    $sql = "SELECT password FROM users WHERE username = '{$username}'";

    $result = $db->select($sql);

    $hash = implode("", $result->fetch_assoc());

    if(password_verify($oldpassword, $hash)) {
        session_start();
        unset($_SESSION["user"]);
        session_destroy();
        session_start();
        $_SESSION["user"] = $username;

        $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET name='{$name}', surname = '{$surname}', username = '{$username}', email = '{$email}', password = '{$hashed_password}' WHERE id = $id";
    
        $db->update($sql);

        echo "success";
    } else {
        echo "failed";
    }
?>