<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $class_schedule = $_POST['class_schedule'];

    $sql = "INSERT INTO classes (class_id,class_name,class_schedule)
     VALUES ('$class_id','$class_name','$class_schedule')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: read_classes.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Class</title>
</head>
<body>
    <h1>Add New Class</h1>
<form method="post" action="">

    <label for="class_id">Class ID:</label>
    <input type="text" id="class_id" name="class_id" required><br>

    <label for="class_name">Class Name:</label>
    <input type="text" id="class_name" name="class_name" required><br>

    <label for="class_schedule">Class Schedule:</label>
    <input type="text" id="class_schedule" name="class_schedule" required><br>

    <button type="submit" name="update">Add Class</button>
        
</form>
    <a href="read_classes.php">Back to Class List</a>
</body>
</html>