<?php
include 'db_connect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM course WHERE course_id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Courses deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<a href="read_courses.php">Back to Course List</a>

