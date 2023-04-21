<?php
    // Session start & Connect the MySql
    session_start();
    $db = mysqli_connect("localhost", "root", "", "simple_crud");

    // Initialize Variables
    $name = "";
    $city = "";
    $id = 0;
    $update = false;

    // POST Add new data
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $city = $_POST['city'];

        mysqli_query($db, "INSERT INTO user (name, city) VALUES ('$name', '$city')");
        $_SESSION['alert'] = "Data saved!";
        header("location: index.php");
    }

    // POST Update data
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $city = $_POST['city'];

        mysqli_query($db, "UPDATE user SET name='$name', city='$city' WHERE id=$id");
        $_SESSION['alert'] = "Data updated!";
        header("location: index.php");
    }

    // GET Delete data
    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        mysqli_query($db, "DELETE FROM user WHERE id=$id");
        $_SESSION['alert'] = "Data deleted!";
        header("location: index.php");
    }
?>
