<?php
// db_connection.php - Include the connection file
require 'db_connection.php';

// Determine the action to perform (view, insert, update, delete)
$action = isset($_GET['action']) ? $_GET['action'] : 'view';

// Handle different actions
switch ($action) {
    case 'view':
        viewProjects();
        break;
    case 'insert':
        insertProject();
        break;
    case 'update':
        updateProject();
        break;
    case 'delete':
        deleteProject();
        break;
    default:
        echo "Invalid action.";
}

// View Projects (Fetch all projects from the database)
function viewProjects() {
    global $pdo;
    $query = "SELECT * FROM projects ORDER BY created_at DESC LIMIT 6";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return or display projects
    return $projects; // You can return this to the calling page or use this function to display directly
}

// Insert Project
function insertProject() {
    global $pdo;
    
    // Example of data you might get from a form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url']; // Assume this is a URL or path to the image file
    
    $query = "INSERT INTO projects (title, description, image_url, created_at) VALUES (:title, :description, :image_url, NOW())";
    $stmt = $pdo->prepare($query);
    
    // Bind parameters and execute
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image_url', $image_url);
    
    if ($stmt->execute()) {
        echo "Project successfully inserted!";
    } else {
        echo "Failed to insert project.";
    }
}

// Update Project
function updateProject() {
    global $pdo;
    
    $id = $_POST['id']; // Assume ID is passed for updating the specific project
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    
    $query = "UPDATE projects SET title = :title, description = :description, image_url = :image_url WHERE id = :id";
    $stmt = $pdo->prepare($query);
    
    // Bind parameters and execute
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image_url', $image_url);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "Project successfully updated!";
    } else {
        echo "Failed to update project.";
    }
}

// Delete Project
function deleteProject() {
    global $pdo;
    
    $id = $_GET['id']; // ID of the project to delete
    
    $query = "DELETE FROM projects WHERE id = :id";
    $stmt = $pdo->prepare($query);
    
    // Bind parameters and execute
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "Project successfully deleted!";
    } else {
        echo "Failed to delete project.";
    }
}
?>

<!-- Technologies Used -->
<?php
// Include the database connection


// Function to get the service ID by name
function getServiceIdByName($service_name) {
    global $pdo;

    // SQL query to fetch the service ID by name
    $sql = "SELECT id FROM services WHERE name = :service_name LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':service_name', $service_name, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the result
    $service = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the ID if found, else return null
    return $service ? $service['id'] : null;
}

// Function to get projects for a specific service
function getProjectsByServiceName($service_name) {
    global $pdo;

    // Get the service ID
    $service_id = getServiceIdByName($service_name);

    // If the service ID exists, fetch projects
    if ($service_id) {
        $sql = "SELECT * FROM projects WHERE service_id = :service_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
        $stmt->execute();

        // Return the projects
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Return an empty array if no service ID found
    return [];
}
?>

<!-- Services page  -->



<?php
// Include the database connection


// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $service_id = $_POST['service'];

    // Prepare the SQL query to insert the inquiry into the database
    $sql = "INSERT INTO contact_inquiries (name, email, phone, message, service_id) 
            VALUES (:name, :email, :phone, :message, :service_id)";
    
    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':service_id', $service_id);

    // Check if the insertion was successful
    if ($stmt->execute()) {
        // Redirect back to the referring page with a success message
        $redirect_url = $_SERVER['HTTP_REFERER']; // Get the referring page URL
        header("Location: $redirect_url?success=Your inquiry has been successfully submitted. We will respond within 24 hours.");
        exit();
    } else {
        // Redirect back to the referring page with an error message
        $redirect_url = $_SERVER['HTTP_REFERER']; // Get the referring page URL
        header("Location: $redirect_url?success=There was an error submitting your inquiry. Please try again.");
        exit();
    }
}
?>

<!-- Team Member -->
<?php
// Include the database connection
include('db_connection.php');

// Function to get all team members from the database
function getTeamMembers() {
    global $pdo;
    
    // SQL query to select team members from the database
    $sql = "SELECT * FROM team_members";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all team members as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!-- Testimanials -->
<?php
function fetchTestimonials($pdo) {
    $sql = "SELECT name, feedback FROM testimonials ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Retrieve testimonials
$testimonials = fetchTestimonials($pdo);
?>


<!-- q&a -->
