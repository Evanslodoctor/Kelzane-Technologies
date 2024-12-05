<?php
$host = 'localhost'; // Replace with your database host if different
$db = 'kelzane_technologies'; // Name of your database
$user = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php
// Assuming your PDO connection is already established
// Example: include 'db_connection.php' where the PDO connection is set

$query = "SELECT month, subscribers, new_visitors, active_users FROM statistics"; // Adjust the table and column names based on your schema

// Prepare and execute the query
$stmt = $conn->prepare($query);
$stmt->execute();

// Initialize arrays for data
$months = [];
$subscribers = [];
$new_visitors = [];
$active_users = [];

// Fetch data from the query
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $months[] = $row['month'];
    $subscribers[] = $row['subscribers'];
    $new_visitors[] = $row['new_visitors'];
    $active_users[] = $row['active_users'];
}

// Return data as JSON
echo json_encode([
    'months' => $months,
    'subscribers' => $subscribers,
    'new_visitors' => $new_visitors,
    'active_users' => $active_users
]);

// No need to explicitly close the connection with PDO; it's handled automatically when the script ends
?>
