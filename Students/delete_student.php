<?php
include 'db_connect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM student WHERE student_id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<a href="read_student.php">Back to Student List</a>