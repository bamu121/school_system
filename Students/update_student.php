<?php
include 'db_connect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM student WHERE student_id=$student_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['full_name'];
    $email = $_POST['email'];
    $enrollment_date = $_POST['enrollment_date'];
    $department_id= $_POST['department_id'];
    
    $sql = "UPDATE students
            SET first_name='$full_name',email='$email', enrollment_date='$enrollment_date',department_id='$department_id'
            WHERE student_id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="post" action="">
Student_id: <input type="text" name="student_id" required><br>
    Full Name: <input type="text" name="full_name" required><br>
    Email: <input type="email" name="email" required><br>
    Enrollment Date: <input type="date" name="enrollment_date" required><br>
   Department_id: <input type="text" name="department_id" required><br>
  <button type="submit" name="update">Update Student</button>
</form>