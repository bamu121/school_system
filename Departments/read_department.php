<?php
include 'db_connect.php';

$sql = "SELECT * FROM department";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management</title>
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
    <h1 style="text-align: center;">CRUD Operations - Departments</h1>

    <a href="add_department.php" class="add-btn">New Department</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["department_id"] . "</td>
                        <td>" . $row["department_name"] . "</td>
                        <td>
                            <a href='update_department.php?id=" . $row["department_id"] . "' class='action-btn update-btn'>update</a>
                            <a href='delete_department.php?id=" . $row["department_id"] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No Departments Found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>