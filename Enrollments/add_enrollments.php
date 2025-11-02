<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enrollment_id = $_POST['enrollment_id'];
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO enrollment (enrollment_id,student_id, course_id,class_id) 
             VALUES ('$enrollment_id','$student_id', '$course_id','$class_id)";

    if ($conn->query($sql) === TRUE) {
        header("Location: read_enrollments.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Enrollment</title>
</head>
<body>
    <h2>Add Enrollment</h2>
    <form method="POST" action="">
    <label>Enrollment ID</label>
    <input type="text" name="enrollment_id" required><br>
        <label>Student ID</label>
        <input type="text" name="student_id" required><br>
        <label>Course ID</label>
        <input type="text" name="course_id" required><br>
        <label>Class ID</label>
        <input type="text" name="class_id" required><br>
        <input type="submit" value="Add Enrollment">
    </form>
</body>
</html>