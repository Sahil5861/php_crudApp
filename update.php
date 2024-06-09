<?php 
    include "connection.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM crudapp where id = $id";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE crudapp SET name = '$name', email = '$email', created_at = current_timestamp() where id = '$id';";

        if ($conn->query($sql) === TRUE) {
            header("location: view.php");
            echo "Record Updated !!";
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }

        $conn->close();

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update User here :</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $row['name'];?>" required autofocus>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?php echo $row['email'];?>" placeholder="Enter Email" required>

        <input type="submit" name="submit" value="Update User" style="background-color: seagreen; cursor:pointer;">
    </form>
</body>
</html>