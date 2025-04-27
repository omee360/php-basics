<!DOCTYPE html>
<html>

<head>
    <title>User Form</title>
</head>

<body>
    <h1>Enter Your Details</h1>
    <form method="POST" action="form.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];

        // Connect to database
        $conn = mysqli_connect("localhost", "root", "", "php_basics");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert data
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Success! $name, your email ($email) was saved.</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
    }
    ?>
</body>

</html>