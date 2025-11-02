<?php
include 'db_connect.php';

$grade_id = isset($_POST['grade_id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $numeric_grade = $_POST['numeric_grade'];
    $letter_grade = $_POST['letter_grade'];

    // Update the grade in the database
    $sql = "UPDATE grade SET student_id='$student_id', course_id='$course_id', 
            numeric_grade='$numeric_grade', letter_grade='$letter_grade' 
            WHERE grade_id='$grade_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Grade updated successfully";
        header("Location: read_grade.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch the grade details to populate the form
$sql = "SELECT * FROM grade WHERE grade_id='$grade_id'";
$result = $conn->query($sql);
$grade = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Grade</title>
</head>
<body>
    <h1>Update Grade</h1>
    <form action="update_grade.php" method="POST">

    <label>Student ID:</label>
    <input type="text" name="student_id" required><br><br>
        
    <label>Course ID:</label>
    <input type="text" name="course_id" required><br><br>
        
    <label>Numeric Grade:</label>
    <input type="number" name="numeric_grade" required><br><br>
        
    <label>Letter Grade:</label>
    <input type="text" name="letter_grade" required><br><br>
        
    <input type="submit" value="Update Grade">
    </form>
</body>
</html>

<?php
$conn->close();
?>