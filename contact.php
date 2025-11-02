<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us - School Management System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 40px;
      background-color: #f4f6f8;
    }
    form {
      max-width: 500px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      background-color: #007BFF;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <h1>Contact Us</h1>
  <form action="contact" method="POST">
    <label for="name">Your Name:</label>
    <input type="text" name="name" required />

    <label for="email">Your Email:</label>
    <input type="email" name="email" required />

    <label for="message">Message:</label>
    <textarea name="message" rows="5" required></textarea>

    <button type="submit">Send Message</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    echo "<h3>Thank you!</h3>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Message: $message<br>";
  }
  ?>
</body>
</html>
