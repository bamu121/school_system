<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grade_id = $_POST['grade_id'];
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $numeric_grade = $_POST['numeric_grade'];
    $letter_grade = $_POST['letter_grade'];

if ($numeric_grade >= 90) {
        $letter_grade = 'A';
    } elseif ($numeric_grade >= 80) {
        $letter_grade = 'B';
    } elseif ($numeric_grade >= 70) {
        $letter_grade = 'C';
    } elseif ($numeric_grade >= 60) {
        $letter_grade = 'D';
    } else {
        $letter_grade = 'F';
    }

    // Insert the grade into the database
    $sql = "INSERT INTO grade(grade_id,student_id, course_id, numeric_grade, letter_grade) 
            VALUES ('$grade_id','$student_id', '$course_id', '$numeric_grade', '$letter_grade')";

    if ($conn->query($sql) === TRUE) {
        echo "New grade added successfully";
        header("Location: read_grade.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Grade</title>
</head>
<body>
    <h1>Add New Grade</h1>
    <form action="add_grade.php" method="POST">

    <label>Grade ID:</label>
    <input type="text" name="grade_id" required><br><br>

    <label>Student ID:</label>
    <input type="text" name="student_id" required><br><br>
        
    <label>Course ID:</label>
    <input type="text" name="course_id" required><br><br>
        
    <label>Numeric Grade:</label>
    <input type="number" name="numeric_grade" required><br><br>
        
    <!-- <label>Letter Grade:</label>
    <input type="text" name="letter_grade" required><br><br> -->
        
    <input type="submit" value="Add Grade">
    </form>
</body>
</html>

<?php
$conn->close();
?>
