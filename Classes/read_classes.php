<?php
include 'db_connect.php';

$sql = "SELECT * FROM classes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Management</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .action-btn {
            padding: 5px 10px;
            text-decoration: none;
            border: none;
            color: white;
            cursor: pointer;
        }
        .update-btn {
            background-color: blue;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .add-btn {
            margin: 20px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">CRUD Operations - Classes</h1>

    <a href="add_classes.php" class="add-btn">New Class</a>

    <table>
        <thead>
            <tr>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Class Schedule</th>
            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["class_id"] . "</td>
                        <td>" . $row["class_name"] . "</td>
                        <td>" . $row["class_schedule"] . "</td>
                        <td>
                            <a href='update_classes.php?id=" . $row["class_id"] . "' class='action-btn update-btn'>update</a>
                            <a href='delete_classes.php?id=" . $row["class_id"] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No Classes Found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>