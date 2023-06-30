<?php
// Configuration for database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize input data
function sanitize($data) {
    global $conn;
    $data = trim($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

// Initialize variables
$name = $last_name = $email = $mobile = $password = $picture = "";

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = sanitize($_POST["name"]);
    $last_name = sanitize($_POST["last_name"]);
    $email = sanitize($_POST["email"]);
    $mobile = sanitize($_POST["mobile"]);
    $password = sanitize($_POST["password"]);
    $picture = $_FILES["picture"]["name"];

    // Upload the picture file
    $targetDir = "uploads/"; // Directory to store uploaded pictures
    $targetFile = $targetDir . basename($picture);
    move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile);

    // Insert the registration data into the database
    $sql = "INSERT INTO users (name, last_name, email, mobile, password, picture)
            VALUES ('$name', '$last_name', '$email', '$mobile', '$password', '$picture')";
    if (mysqli_query($conn, $sql)) {
        $message = "Your registration completed successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            width: 100%;
        }

        label, input, select {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2 style="text-align: center;">Registration Page</h2>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="mobile">Mobile:</label>
    <input type="text" id="mobile" name="mobile" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="picture">Picture:</label>
    <input type="file" id="picture" name="picture" required>

    <input type="submit" value="Register">
</form>

<?php if (isset($message)) { ?>
    <p><?php echo $message; ?></p>
<?php } ?>

</body>
</html>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>

