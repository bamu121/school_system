<?php
include 'db_connect.php';

// SQL query to select courses
$sql = "SELECT course.course_id, course.course_code, course.course_title, department.department_id 
        FROM course
        LEFT JOIN department ON course.department_id = department.department_id";

// Execute the query and check if it was successful
$result = $conn->query($sql);

// Check if query was successful
if (!$result) {
    // If the query failed, output the error for debugging
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit; // Stop execution if the query fails
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>
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
    <h1 style="text-align: center;">CRUD Operations - Courses</h1>

    <a href="add_course.php" class="add-btn">New Course</a>

    <table>
        <thead>
            <tr>
                <th> Course ID</th>
                <th>Course Code</th>
                <th>Course Title</th>
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
                        <td>" . $row["course_id"] . "</td>
                        <td>" . $row["course_code"] . "</td>
                        <td>" . $row["course_title"] . "</td>
                        <td>" . $row["department_id"] . "</td>
                        <td>
                            <a href='update_course.php?id=" . $row["course_id"] . "' class='action-btn update-btn'>update</a>
                            <a href='delete_course.php?id=" . $row["course_id"] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No Courses Found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>