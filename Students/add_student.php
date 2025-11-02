<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $enrollment_date = $_POST['enrollment_date'];
    $department_id = $_POST['department_id'];
$sql = "INSERT INTO student(student_id,full_name,email, enrollment_date,department_id) 
        VALUES ('$student_id','$full_name','$email', '$enrollment_date','$department_id')";
    
if ($conn->query($sql) === TRUE) {
        echo "New student added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();}
?><html>
    <head>
        <title>student</title>
    </head>
<body>
<form method="post" action="">
Student_id: <input type="text" name="student_id" required><br>
    First Name: <input type="text" name="full_name" required><br>
    Email: <input type="email" name="email" required><br>
    Enrollment Date: <input type="date" name="enrollment_date" required><br>
   Department_id: <input type="text" name="department_id" required><br>
    <input type="submit" value="Add Student">
</form>
</body>
</html>