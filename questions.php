<?php

include 'header.php';

require 'db_connection.php'; // Database connection

// Fetch FAQs from the database
function fetchFAQs($pdo) {
    $sql = "SELECT question, answer FROM faqs ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch services from the database
function fetchServices($pdo) {
    $sql = "SELECT id, name FROM services ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




// Fetch FAQs and Services
$faqs = fetchFAQs($pdo); // Fetch FAQ data
$services = fetchServices($pdo); // Fetch services for selection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['questions'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $question = htmlspecialchars(trim($_POST['question']));
    $service_id = isset($_POST['service_id']) ? (int)$_POST['service_id'] : 0;

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email address.";
    } elseif (strlen($name) > 255 || strlen($email) > 255 || strlen($question) > 1000) {
        $error_message = "Please ensure all fields meet the length requirements.";
    } elseif ($service_id !== 0 && !in_array($service_id, array_column($services, 'id'))) {
        $error_message = "Invalid service selected.";
    } else {
        // Insert question into the database
        if (insertInquiry($pdo, $name, $email, $question, $service_id)) {
            $success_message = "Your question has been submitted successfully!";
        } else {
            $error_message = "There was an error submitting your question. Please try again.";
        }
    }
}

// Save user-submitted question to the database
function insertInquiry($pdo, $name, $email, $question, $service_id) {
    try {
        $sql = "INSERT INTO user_questions (name, email, question, service_id) VALUES (:name, :email, :question, :service_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':service_id', $service_id);

        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Database error: " . implode(" | ", $stmt->errorInfo()));
            return false;
        }
    } catch (PDOException $e) {
        error_log("PDOException: " . $e->getMessage());
        return false;
    }
}
?>

<!-- FAQ Section -->
<section class="faq section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p>Have questions? We’ve got answers to help you make informed decisions.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion" id="faqAccordion">
                    <?php if (!empty($faqs)): ?>
                        <?php foreach ($faqs as $index => $faq): ?>
                            <div class="card">
                                <div class="card-header" id="faq<?= $index ?>">
                                    <h5>
                                        <button class="btn btn-link <?= $index === 0 ? '' : 'collapsed' ?>" data-toggle="collapse" data-target="#collapse<?= $index ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $index ?>">
                                            <?= htmlspecialchars($faq['question']) ?>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse<?= $index ?>" class="collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="faq<?= $index ?>" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <?= htmlspecialchars($faq['answer']) ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No FAQs available at the moment.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ask a Question Section -->
<section id="ask-question" class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form class="form" method="POST" action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <input name="name" type="text" placeholder="Your Name" maxlength="255" required>
                        </div>
                        <div class="col-lg-6">
                            <input name="email" type="email" placeholder="Your Email" maxlength="255" required>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="question" placeholder="Type your question here..." maxlength="1000" required></textarea>
                        </div>
                        <div class="col-lg-12">
                            <select name="service_id" class="form-control">
                                <option value="0">General Inquiry</option>
                                <?php foreach ($services as $service): ?>
                                    <option value="<?= $service['id'] ?>"><?= htmlspecialchars($service['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" name="questions" class="btn">Submit Question</button>
                        </div>
                    </div>
                </form>
                <?php if (isset($success_message)): ?>
                    <p class="alert alert-success"><?= htmlspecialchars($success_message) ?></p>
                <?php elseif (isset($error_message)): ?>
                    <p class="alert alert-danger"><?= htmlspecialchars($error_message) ?></p>
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <img src="img/contact-img.png" alt="Ask a Question">
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
