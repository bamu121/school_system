<?php
include 'db_connect.php';

$id = isset($_POST['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course_title'];
    $department_id = $_POST['department_id'];
    
    $sql = "UPDATE course SET course_id='$course_id',course_code='$course_code', course_title='$course_title', department_id=$department_id WHERE course_id=$course_id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: read_courses.php");
    } else {
        echo "Error updating course: " . $conn->error;
    }
}

$sql = "SELECT * FROM courses WHERE course_id=$id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Course</title>
</head>
<body>
    <h1>Update Course</h1>
    <form method="post" action="">

<label for="course_id">Course ID:</label>
<input type="text" id="course_id" name="course_id" required><br>

<label for="course_code">Course code:</label>
<input type="number" id="course_code" name="course_code" required><br>

<label for="course_title">Course Title:</label>
<input type="text" id="course_title" name="course_title" required><br>

<label for="department_id">Department ID:</label>
<input type="text" id="department_id" name="department_id" required><br>
<input type="submit" value="update course">
</form>
    <a href="read_courses.php">Back to Course List</a>
</body>
</html>