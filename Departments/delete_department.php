<?php
include 'db_connect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM department WHERE department_id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Department deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<a href="read_department.php">Back to Student List</a>