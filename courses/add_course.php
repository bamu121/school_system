<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course_title'];
    $department_id = $_POST['department_id'];

$sql = "INSERT INTO course(course_id,course_code, course_title, department_id) 
    VALUES ('$course_id','$course_code', '$course_title', '$department_id')";
    
if ($conn->query($sql) === TRUE) {
        header("Location: read_course.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Course</title>
</head>
<body>
    <h1>Add New Course</h1>
    <form method="post" action="">

            <label for="course_id">Course ID:</label>
            <input type="text" id="course_id" name="course_id" required><br>

            <label for="course_code">Course Code:</label>
            <input type="number" id="course_code" name="course_code" required><br>

            <label for="course_title">Course title:</label>
            <input type="text" id="course_title" name="course_title" required><br>

            <label for="department_id">Department ID:</label>
            <input type="text" id="department_id" name="department_id" required><br>
            <input type="submit" value="Add Course">
    </form>
    <a href="read_courses.php">Back to Course List</a>
</body>
</html>