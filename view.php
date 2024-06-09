<?php  include "connection.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Added Users</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
            $sql = "select * from crudapp;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <th>".$i."</th>
                            <td>".$row["name"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["created_at"]."</td>
                            <td><a href='update.php?id=".$row["id"]."'>Edit</a></td>    
                            <td><a href='delete.php?id=".$row["id"]."'>Delete</a></td>    
                        </tr>";
                    $i+=1;
                }
            }
        ?>
    </table>
    
</body>
</html>