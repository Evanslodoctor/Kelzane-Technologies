<?php
include 'header.php';
// Include the CRUD operations file
require 'crud_operations.php';

?>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="text">
                    <h1>About Kelzane Technologies</h1>
                    <p>At Kelzane Technologies, we specialize in delivering innovative and sustainable technological solutions that empower businesses and transform communities. Our expertise spans across software development, IT consultancy, and much more, making us the trusted partner for businesses of all sizes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission & Vision -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Our Mission & Vision</h2>
                    <p>We are driven by a strong mission and vision to help businesses thrive in the digital age through innovative technology solutions.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h3>Mission</h3>
                <p>Our mission is to deliver innovative, sustainable, and tailored technological solutions that empower businesses and transform communities.</p>
            </div>
            <div class="col-lg-6">
                <h3>Vision</h3>
                <p>Our vision is to be a global leader in technology solutions and a trusted partner for businesses of all sizes, providing high-quality and reliable services.</p>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="core-values section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Our Core Values</h2>
                    <p>We believe in these guiding principles to provide the best services to our clients:</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="value">
                    <h4>Innovation</h4>
                    <p>We strive to be at the forefront of technological innovation to solve complex challenges and deliver unique solutions.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="value">
                    <h4>Customer-Centricity</h4>
                    <p>We prioritize our customers' needs and ensure their success by delivering tailored solutions that meet their goals.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="value">
                    <h4>Integrity</h4>
                    <p>We conduct our business with the highest level of integrity, maintaining trust with our clients and partners.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Meet Our Team</h2>
                    <p>Our team of experts is dedicated to delivering exceptional solutions and supporting our clients every step of the way.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            // Include the functions file and retrieve team members
          
            $team_members = getTeamMembers();

            // Loop through each team member and display their details
            foreach ($team_members as $member) {
                echo '<div class="col-lg-4">
                        <div class="team-member">
                            <img src="' . htmlspecialchars($member['image_url']) . '" alt="Team Member ' . htmlspecialchars($member['name']) . '">
                            <h1>' . htmlspecialchars($member['name']) . '</h1>
                            <p>' . htmlspecialchars($member['position']) . '</p>
                            <p>' . htmlspecialchars($member['bio']) . '</p>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
</section>



<?php
// Include the database connection
//include('db_connection.php'); // Make sure to provide the correct path to db_connection.php

// Check if there is a success message in the query parameter
$successMessage = isset($_GET['success']) ? $_GET['success'] : '';

// Fetch services for the dropdown
$sql = "SELECT * FROM services";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Start Service Inquiry -->
<section class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Contact Us to Discuss Your Next Technology Solution</h2>
                    <img src="img/section-img.png" alt="Kelzane Technologies">
                    <p>Reach out to us for tailored solutions to empower your business with cutting-edge technology.</p>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <?php if ($successMessage): ?>
            <div class="alert alert-success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <!-- Contact Form -->
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form class="form" action="crud_operations.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="email" type="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="phone" type="text" placeholder="Phone Number" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <select name="service" class="form-control wide" required>
                                    <option value="" disabled selected>Service Needed</option>
                                    <?php foreach ($services as $service): ?>
                                        <option value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Briefly describe your requirements..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="form-group">
                                <div class="button">
                                    <button type="submit" class="btn">Submit Inquiry</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8 col-12">
                            <p>( We will respond within 24 hours )</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="appointment-image">
                    <img src="img/contact-img.png" alt="Contact Kelzane Technologies">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Service Inquiry -->

	<!-- Start Newsletter Area -->
<section class="newsletter section">
<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
<?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <!-- Start Newsletter Content -->
                <div class="subscribe-text">
                    <h6>Stay Updated with Kelzane Technologies</h6>
                    <p>Subscribe to our newsletter to receive updates on our innovative solutions, services, and community impact.</p>
                </div>
                <!-- End Newsletter Content -->
            </div>
            <div class="col-lg-6 col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-form">
                    <form action="subscribe.php" method="post" class="newsletter-inner">
                        <input name="EMAIL" placeholder="Enter your email address" class="common-input" 
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email address'" 
                            required type="email">
                        <button class="btn">Subscribe</button>
                    </form>
                </div>
                <!-- End Newsletter Form -->
            </div>
        </div>
    </div>
</section>


<?php
include 'footer.php';
?>
