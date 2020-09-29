<?php
    require "./../DbHandler.php";
    use db\DbHandler;

    $db = new DbHandler();

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //$sword = $_POST["sword"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name, surname, username, password, email) VALUES ('{$name}', '{$surname}', '{$username}', '{$hashed_password}', '{$email}')";

    $db->insert($sql);

    header("Location: ../../index.php");
?>