<?php
include 'db_connect.php';

$sql = "SELECT * FROM enrollment";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enrollments Management</title>
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
    <h1 style="text-align: center;">CRUD Operations - Enrollments</h1>

    <a href="add_enrollments.php" class="add-btn">New Enrollments</a>

    <table>
        <thead>
            <tr>
                <th> Enrollments ID</th>
                <th>student ID</th>
                <th>Course ID</th>
                <th>Class ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["enrollment_id"] . "</td>
                        <td>" . $row["student_id"] . "</td>
                        <td>" . $row["course_id"] . "</td>
                        <td>" . $row["class_id"] . "</td>
                        <td>
                            <a href='update_enrollments.php?id=" . $row["enrollments_id"] . "' class='action-btn update-btn'>update</a>
                            <a href='delete_enrollments.php?id=" . $row["enrollments_id"] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No enrollments Found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>