<?php
session_start();
include 'db_connection.php'; // Include your PDO connection script

// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare SQL query to fetch user details
        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Check if a user with that email exists
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the user details

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                // Redirect to the home page
                header("Location: index.php");
                exit(); // Ensure the script stops after redirection
            } else {
                // Invalid password
                echo "<script>alert('Invalid login credentials!');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            }
        } else {
            // User not found
            echo "<script>alert('No user found with that email!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }

    } catch (PDOException $e) {
        // Handle any PDO errors
        echo "Error: " . $e->getMessage();
    }
}
?>
