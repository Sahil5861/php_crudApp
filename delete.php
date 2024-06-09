<?php
include "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE from crudapp where id = $id";
    if ($conn->query($sql) === TRUE) {
        header("location: view.php");
    }
    else{
        echo "Error".$sql."<br>".$conn->error;
    }
    $conn->close();
}
?>