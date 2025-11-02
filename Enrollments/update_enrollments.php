<?php
include 'db_connect.php';

$enrollment_id = isset($_POST['enrollment_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $class_id = $_POST['class_id'];

    $sql = "UPDATE enrollment SET student_id='$student_id', course_id='$course_id',class_id='$class_id' WHERE enrollment_id=$enrollment_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read_enrollment.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM enrollment WHERE enrollment_id=$enrollment_id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Enrollment</title>
</head>
<body>
    <h2>Edit Enrollment</h2>
    <form method="POST" action="">
    <form method="POST" action="">

    <label>Enrollment ID</label>
    <input type="text" name="enrollment_id" required><br>

    <label>Student ID</label>
    <input type="text" name="student_id" required><br>

    <label>Course ID</label>
    <input type="text" name="course_id" required><br>
    
    <label>Class ID</label>
    <input type="text" name="class_id" required><br>
    <input type="submit" value="Update Enrollment">
    </form>
</body>
</html>

<?php
$conn->close();
?>