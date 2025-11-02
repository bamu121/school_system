<?php
include 'db_connect.php';

$grade_id = isset($_POST['grade_id']);

// SQL query to delete the grade
$sql = "DELETE FROM grade WHERE grade_id='$grade_id'";

if ($conn->query($sql) === TRUE) {
    echo "Grade deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<a href="read_grade.php"> Back to Grades List</a>