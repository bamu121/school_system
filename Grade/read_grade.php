<?php
include 'db_connect.php';

// SQL query to join students, courses, and grades tables
$sql = "SELECT grade.grade_id, student.student_id, student.full_name, 
               course.course_id, course.course_title, 
               grade.numeric_grade, grade.letter_grade
        FROM grade
        LEFT JOIN student ON grade.student_id = student.student_id
        LEFT JOIN course ON grade.course_id = course.course_id";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Management</title>
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
    <h1 style="text-align: center;">CRUD Operations - Grades</h1>

    <a href="add_grade.php" class="add-btn">New Grade</a>

    <table>
        <thead>
            <tr>
                <th>Grade ID</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Course ID</th>
                <th>Course Title</th>
                <th>Numeric Grade</th>
                <th>Letter Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                       <td>" . $row["grade_id"] . "</td>
                        <td>" . $row["student_id"] . "</td>
                        <td>" . $row["full_name"] . "</td>
                        <td>" . $row["course_id"] . "</td>
                        <td>" . $row["course_title"] . "</td>
                        <td>" . $row["numeric_grade"] . "</td>
                        <td>" . $row["letter_grade"] . "</td>
                        <td>
                            <a href='update_grade.php?id=" . $row["grade_id"] . "' class='action-btn update-btn'>update</a>
                            <a href='delete_grade.php?id=" . $row["grade_id"] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No Grades Found</td></tr>";
        }
        ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>