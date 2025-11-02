<?php
include 'db_connect.php';

// SQL query
$sql = "SELECT student.student_id, student.full_name,student.email, student.enrollment_date, department.department_id
        FROM student 
        LEFT JOIN department ON student.department_id = department.department_id";

// Execute the query and check for errors
$result = $conn->query($sql);

// Check if query was successful
if (!$result) {
    // If the query failed, display the error
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit; // Stop execution if the query fails
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
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
    <h1 style="text-align: center;">CRUD Operations - Students</h1>

    <a href="add_student.php" class="add-btn">New Student</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>full_name</th>
                <th>Email</th>
                <th>Enrollment Date</th>
                <th>Department ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Check if there are any results
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["student_id"] . "</td>
                        <td>" . $row["full_name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["enrollment_date"] . "</td>
                        <td>" . $row["department_id"] . "</td>
                        <td>
                            <a href='update_student.php?id=" . $row["student_id"] . "' class='action-btn update-btn'>update</a>
                            <a href='delete_student.php?id=" . $row["student_id"] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No Students Found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>