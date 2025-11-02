<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];

    $sql = "INSERT INTO department (department_id,department_name) 
    VALUES ('$department_id','$department_name')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New department added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="post" action="">

        <label for="department_id">Department ID:</label>
        <input type="text" id="department_id" name="department_id" required>

        <label for="department_name">Department Name:</label>
        <input type="text" id="department_name" name="department_name" required>
    <input type="submit" value="Add Department">
    <a href="read_courses.php">Back to Course List</a>
</form>