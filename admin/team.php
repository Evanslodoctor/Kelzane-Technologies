<?php 
include 'header.php';
// Include database connection
include 'db_connection.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editUser'])) {
    $userId = $_POST['userId'];
    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $role = $_POST['userRole'];
    $password = $_POST['userPassword'];
    $photo = null;

    // Fetch existing user data to preserve current photo if no new photo is uploaded
    $stmt = $conn->prepare("SELECT photo FROM users WHERE id = :id");
    $stmt->execute([':id' => $userId]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    // Handle file upload if a new photo is provided
    if (isset($_FILES['userPhoto']) && $_FILES['userPhoto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $photoPath = $uploadDir . basename($_FILES['userPhoto']['name']);
        if (move_uploaded_file($_FILES['userPhoto']['tmp_name'], $photoPath)) {
            $photo = 'uploads/' . basename($_FILES['userPhoto']['name']);
        }
    } else {
        $photo = $existingUser['photo'];
    }

    // Hash the password only if a new one is provided
    $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : null;

    // Prepare the SQL query
    $sql = "UPDATE users SET name = :name, email = :email, role = :role, photo = :photo";
    $params = [
        ':name' => $name,
        ':email' => $email,
        ':role' => $role,
        ':photo' => $photo,
        ':id' => $userId
    ];

    if ($hashedPassword) {
        $sql .= ", password = :password";
        $params[':password'] = $hashedPassword;
    }

    $sql .= " WHERE id = :id";

    // Execute the query
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    // header("Location: team.php"); // Refresh the page
    // exit;
}
?>

<?php


// Function to validate input
function validateInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Add User
// Edit User
if (isset($_POST['action']) && $_POST['action'] == 'editUser') {
    $id = validateInput($_POST['id']);
    $name = validateInput($_POST['name']);
    $email = validateInput($_POST['email']);
    $role = validateInput($_POST['role']);
    $password = !empty($_POST['password']) ? password_hash(validateInput($_POST['password']), PASSWORD_BCRYPT) : null;

    try {
        $sql = "UPDATE users SET name = :name, email = :email, role = :role";
        if ($password) {
            $sql .= ", password = :password";
        }
        $sql .= " WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);
        if ($password) {
            $stmt->bindParam(':password', $password);
        }

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'User updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update user.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}

// Delete User
if (isset($_POST['action']) && $_POST['action'] == 'deleteUser') {
    $id = validateInput($_POST['id']);

    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'User deleted successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete user.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}
?>

      <!-- End Sidebar -->


      <!-- Main section -->

      <div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Manage Users</h3>
        <h6 class="op-7 mb-2">Add, Edit, or Remove System Users</h6>
      </div>
      <div class="ms-md-auto py-2 py-md-0">
        <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Add New User
          </button>
          
      </div>
    </div>

    <!-- User List Table -->
    <div class="card card-round">
      <div class="card-header">
        <div class="card-head-row">
          <div class="card-title">User List</div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
          <?php
$query = "SELECT * FROM users";
$stmt = $conn->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<tbody>
<?php foreach ($users as $user): ?>
  <tr>
    <td>
      <div class="avatar">
        <img src="<?= htmlspecialchars($user['photo'] ?? 'assets/img/default_avatar.jpg') ?>" 
             alt="<?= htmlspecialchars($user['name']) ?>" 
             class="avatar-img rounded-circle" />
      </div>
    </td>
    <td><?= htmlspecialchars($user['name']) ?></td>
    <td><?= htmlspecialchars($user['email']) ?></td>
    <td><?= htmlspecialchars($user['role']) ?></td>
    <td>
      <button class="btn btn-warning btn-round btn-icon btn-link btn-primary" 
              data-bs-toggle="modal" data-bs-target="#editUserModal"
              data-id="<?= $user['id'] ?>"
              data-name="<?= htmlspecialchars($user['name']) ?>"
              data-email="<?= htmlspecialchars($user['email']) ?>"
              data-role="<?= htmlspecialchars($user['role']) ?>"
              data-photo="<?= htmlspecialchars($user['photo'] ?? 'assets/img/default_avatar.jpg') ?>">
        <i class="fas fa-edit"></i>
      </button>
      <a href="team.php?id=<?= $user['id'] ?>" 
   class="btn btn-icon btn-link btn-danger" 
   onclick="return confirm('Are you sure you want to delete this user?')">
   <i class="fas fa-trash"></i>
</a>


    </td>
  </tr>
<?php endforeach; ?>
</tbody>


          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Adding New User -->
<?php

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



<!-- add user form  -->

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editUserForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="editUserId" name="userId" />
          <div class="form-group">
            <label for="editUserName">Full Name</label>
            <input type="text" class="form-control" id="editUserName" name="userName" required />
          </div>
          <div class="form-group">
            <label for="editUserEmail">Email</label>
            <input type="email" class="form-control" id="editUserEmail" name="userEmail" required />
          </div>
          <div class="form-group">
            <label for="editUserRole">Role</label>
            <select class="form-control" id="editUserRole" name="userRole">
              <option value="admin">Admin</option>
              <option value="editor">Editor</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="form-group">
            <label for="editUserPhoto">Photo</label>
            <input type="file" class="form-control" id="editUserPhoto" name="userPhoto" />
            <img id="photoPreview" src="" alt="Current Photo" class="mt-3 img-thumbnail" width="150" />
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-round" name="editUser">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- footer -->
     
<?php
include 'footer.php';
?>
<script>

document.querySelectorAll('[data-bs-target="#editUserModal"]').forEach(button => {
  button.addEventListener('click', function () {
    const userId = this.getAttribute('data-id');
    const userName = this.getAttribute('data-name');
    const userEmail = this.getAttribute('data-email');
    const userRole = this.getAttribute('data-role');
    const userPhoto = this.getAttribute('data-photo');

    // Populate the modal fields
    document.getElementById('editUserId').value = userId;
    document.getElementById('editUserName').value = userName;
    document.getElementById('editUserEmail').value = userEmail;
    document.getElementById('editUserRole').value = userRole;

    // Display current user photo
    const photoPreview = document.getElementById('photoPreview');
    if (photoPreview) {
      photoPreview.src = userPhoto;
    }
  });
});

document.querySelectorAll('[data-bs-target="#editUserModal"]').forEach(button => {
  button.addEventListener('click', function () {
    const userId = this.getAttribute('data-id');

    fetch(`getUserData.php?id=${userId}`)
      .then(response => response.json())
      .then(data => {
        document.getElementById('editUserId').value = data.id;
        document.getElementById('editUserName').value = data.name;
        document.getElementById('editUserEmail').value = data.email;
        document.getElementById('editUserRole').value = data.role;
        const photoPreview = document.getElementById('photoPreview');
        if (photoPreview) {
          photoPreview.src = data.photo || 'assets/img/default_avatar.jpg';
        }
      })
      .catch(error => console.error('Error fetching user data:', error));
  });
});


</script>
<!-- accessing by id -->
<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'role' => $user['role'],
        'photo' => $user['photo'] ?? 'assets/img/default_avatar.jpg',
    ]);
}
?>

<!-- deleting users  -->

<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare and execute the delete statement
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Redirect with success message
            header("Location: user_list.php?message=User deleted successfully");
            exit();
        } else {
            // Redirect with failure message
            header("Location: user_list.php?error=Failed to delete user");
            exit();
        }
    } catch (PDOException $e) {
        // Redirect with exception message
        header("Location: user_list.php?error=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Redirect if no ID is provided
    header("Location: user_list.php?error=Invalid request");
    exit();
}
?>

<!-- Handling responses -->
<?php if (isset($_GET['message'])): ?>
<div class="alert alert-success">
    <?= htmlspecialchars($_GET['message']) ?>
</div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
<div class="alert alert-danger">
    <?= htmlspecialchars($_GET['error']) ?>
</div>
<?php endif; ?>

