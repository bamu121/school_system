<?php
include 'db_connect.php';

if (isset($_GET['department_id'])) {
    $department_id = $_POST['department_id'];
    $sql = "SELECT * FROM department WHERE department_id=$department_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
    
    $sql = "UPDATE department SET department_name='$department_name' WHERE department_id=$department_id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Department updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="post" action="">
        <label for="department_id">Department ID:</label>
        <input type="text" id="department_id" name="department_id" required>

        <label for="department_name">New Department Name:</label>
        <input type="text" id="department_name" name="department_name" required>

        <button type="submit" name="update">Update Department</button>
        </form>