<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addUser'])) {
    // Retrieve and validate form data
    $name = trim($_POST['userName']);
    $email = trim($_POST['userEmail']);
    $role = $_POST['userRole'];
    $password = trim($_POST['userPassword']);
    $photoPath = '';

    // Handle image upload
    if (isset($_FILES['userPhoto']) && $_FILES['userPhoto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['userPhoto']['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Validate file type and size
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
        } elseif ($_FILES['userPhoto']['size'] > 2 * 1024 * 1024) { // Max size: 2MB
            echo "<script>alert('File size must not exceed 2MB.');</script>";
        } else {
            // Move uploaded file to the destination directory
            if (move_uploaded_file($_FILES['userPhoto']['tmp_name'], $uploadFile)) {
                $photoPath = $uploadFile;
            } else {
                echo "<script>alert('Failed to upload the image.');</script>";
            }
        }
    }

    // Validate other fields
    if (empty($name) || empty($email) || empty($role) || empty($password)) {
        echo "<script>alert('All fields are required.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } else {
        try {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert user into database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, photo) VALUES (:name, :email, :password, :role, :photo)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':photo', $photoPath);

            if ($stmt->execute()) {
                echo "<script>alert('User added successfully.'); window.location.reload();</script>";
            } else {
                echo "<script>alert('Failed to add user.');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Database error: " . $e->getMessage() . "');</script>";
        }
    }
}
?>

<!-- Modal for Adding New User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" id="addUserForm">
          <div class="form-group">
            <label for="userName">Name</label>
            <input type="text" name="userName" class="form-control" id="userName" placeholder="Enter Name" required />
          </div>
          <div class="form-group">
            <label for="userEmail">Email</label>
            <input type="email" name="userEmail" class="form-control" id="userEmail" placeholder="Enter Email" required />
          </div>
          <div class="form-group">
            <label for="userRole">Role</label>
            <select name="userRole" class="form-control" id="userRole" required>
              <option value="admin">Admin</option>
              <option value="editor">Editor</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="form-group">
            <label for="userPassword">Password</label>
            <input type="password" name="userPassword" class="form-control" id="userPassword" placeholder="Enter Password" required />
          </div>
          <div class="form-group">
            <label for="userPhoto">Photo</label>
            <input type="file" name="userPhoto" class="form-control" id="userPhoto" />
          </div>
          <button type="submit" name="addUser" class="btn btn-primary mt-3">Save User</button>
        </form>
      </div>
    </div>
  </div>
</div>
