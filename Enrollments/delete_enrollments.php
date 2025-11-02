<?php
include 'db_connect.php';

$enrollment_id = $_POST['enrollment_id'];

$sql = "DELETE FROM enrollment WHERE enrollment_id=$enrollment_id";

if ($conn->query($sql) === TRUE) {
    header("Location: read_enrollments.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>