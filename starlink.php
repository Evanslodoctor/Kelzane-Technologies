<?php
include 'header.php';
require 'crud_operations.php';
?>
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="text">
                        <h1>Reliable <span>Starlink Installation Services</span></h1>
                        <p>Get uninterrupted high-speed internet connectivity with our expert Starlink installation services.</p>
                        <div class="button">
                        <a href="request-service.php" class="btn">Request Service</a>
                        <a href="#pricing" class="btn primary">View Pricing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Overview -->
    <section class="service-overview section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>About Our Starlink Installation Services</h2>
                        <p>We ensure seamless installation and setup of Starlink systems for homes and businesses, ensuring optimal performance and reliability.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h2>Why Choose Us?</h2>
                    <ul class="list">
                        <li><i class="fa fa-caret-right"></i> Expert installation for homes and businesses.</li>
                        <li><i class="fa fa-caret-right"></i> Optimized setup for maximum performance.</li>
                        <li><i class="fa fa-caret-right"></i> Professional advice on equipment placement.</li>
                        <li><i class="fa fa-caret-right"></i> Reliable post-installation support.</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="img/other services/starlink.jpg" alt="Starlink Installation">
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features section">
        <div class="container">
            <div class="section-title">
                <h2>What Makes Us Stand Out?</h2>
            </div>
            <ul class="list">
                <li><i class="fa fa-caret-right"></i> Certified technicians with extensive experience in satellite systems.</li>
                <li><i class="fa fa-caret-right"></i> Tailored solutions for rural and urban setups.</li>
                <li><i class="fa fa-caret-right"></i> Comprehensive testing to ensure stability and speed.</li>
                <li><i class="fa fa-caret-right"></i> Affordable and transparent pricing.</li>
            </ul>
        </div>
    </section>

    <!-- Process -->
    <section class="our-process section">
        <div class="container">
            <div class="section-title">
                <h2>Our Starlink Installation Process</h2>
                <p>From consultation to connectivity, we provide a smooth and hassle-free experience.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <h4>1. Consultation</h4>
                        <p>Understand your internet needs and site requirements.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <h4>2. Site Survey</h4>
                        <p>Evaluate the best placement for optimal signal reception.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <h4>3. Installation</h4>
                        <p>Install the Starlink system professionally and configure it for maximum performance.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-step">
                        <h4>4. Testing & Support</h4>
                        <p>Test the connection and provide ongoing support to ensure satisfaction.</p>
                    </div>
                </div>
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

<!-- /End Newsletter Area -->
<?php
include 'footer.php';
?>

