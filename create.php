<?php
    include "connection.php";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO `crudapp` (`name`, `email`, `created_at`) VALUES ('$name', '$email', current_timestamp());";

        if ($conn->query($sql)== TRUE) {
            echo "New Record Inserted !!";
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }

        $conn->close();

    }
?>
<!-- INSERT INTO `crudapp` (`id`, `name`, `email`, `created_at`) VALUES ('1', 'sahil001', 'sahil123@gmail.com', current_timestamp()); -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="create.php" method="post">
        <h1>Create User</h1>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter Name" required autofocus>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter Email" required>

        <input type="submit" name="submit" value="Add User" style="background-color: seagreen; cursor:pointer;">
    </form>
</body>
</html>