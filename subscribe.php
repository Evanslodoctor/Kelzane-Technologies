<?php
// Include the database connection
include('db_connection.php');

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email from the form
    $email = $_POST['EMAIL'];

    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if the email already exists in the subscriptions table
        $sql_check = "SELECT COUNT(*) FROM subscriptions WHERE email = :email";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->bindParam(':email', $email);
        $stmt_check->execute();
        $count = $stmt_check->fetchColumn();

        if ($count > 0) {
            // Email already exists, redirect with a message
            header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=You have already subscribed to our newsletter.");
            exit();
        } else {
            // Email is not subscribed, proceed with insertion
            $sql_insert = "INSERT INTO subscriptions (email) VALUES (:email)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->bindParam(':email', $email);

            // Check if the insertion was successful
            if ($stmt_insert->execute()) {
                // Redirect back with a success message
                header("Location: " . $_SERVER['HTTP_REFERER'] . "?success=Thank you for subscribing to our newsletter!");
                exit();
            } else {
                // Redirect back with an error message
                header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=There was an error with your subscription. Please try again.");
                exit();
            }
        }
    } else {
        // Redirect back with a validation error message
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=Please enter a valid email address.");
        exit();
    }
}
?>
