<?php
    require "./../DbHandler.php";
    use db\DbHandler;

    $db = new DbHandler();

    session_start();

    $username = $_SESSION["user"];

    $sql = "SELECT * FROM users WHERE username = '".$username."'";

    $result = $db->select($sql);
    $row = $result->fetch_assoc();

    $uid = $row["id"];
    $likes = $_POST["likes"];
    $bid = $_POST["id"];

    $sql = "UPDATE beers SET likes = '".$likes."' WHERE id = '".$bid."'";
    $db->update($sql);

    $sql = "SELECT * FROM votes WHERE uid = '".$uid."' AND bid = '".$bid."'";
    if(($db->select($sql))->fetch_assoc() == null) {
        $sql = "INSERT INTO votes(uid, bid) VALUES ('".$uid."', '".$bid."')";
        $db->insert($sql);
    } else {
        $sql = "DELETE FROM votes WHERE uid = '".$uid."' AND bid = '".$bid."'";
        $db->delete($sql);
    }
?>