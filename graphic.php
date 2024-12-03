<?php
include 'header.php';
require 'crud_operations.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="text">
                    <h1>Exceptional <span>Graphic Design</span> Services</h1>
                    <p>Transforming ideas into visually stunning designs that resonate with your audience.</p>
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
                    <h2>Why Choose Us?</h2>
                    <p>We transform your ideas into compelling visual content that resonates with your target audience.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Our Graphic Design Solutions Include:</h2>
                <ul class="list">
                    <li><i class="fa fa-caret-right"></i> Logo Design and Branding</li>
                    <li><i class="fa fa-caret-right"></i> Social Media Graphics</li>
                    <li><i class="fa fa-caret-right"></i> Marketing Materials (Flyers, Brochures, Posters)</li>
                    <li><i class="fa fa-caret-right"></i> Business Cards and Stationery</li>
                    <li><i class="fa fa-caret-right"></i> Website and App UI/UX Design</li>
                    <li><i class="fa fa-caret-right"></i> Infographics and Custom Illustrations</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="img/other services/graphics.jpg" alt="Graphic Design Services">
            </div>
        </div>
    </div>
</section>


<!-- Benefits -->
<section class="benefits section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Benefits of Our Graphic Design Services</h2>
                    <p>Why businesses trust Kelzane for their design needs.</p>
                </div>
            </div>
        </div>
        <ul class="list">
            <li><i class="fa fa-caret-right"></i> Elevate your brand identity</li>
            <li><i class="fa fa-caret-right"></i> Captivate your audience with eye-catching visuals</li>
            <li><i class="fa fa-caret-right"></i> Ensure consistent messaging across platforms</li>
            <li><i class="fa fa-caret-right"></i> Stand out from competitors with unique designs</li>
            <li><i class="fa fa-caret-right"></i> Increase engagement and customer trust</li>
        </ul>
    </div>
</section>
<section class="our-process section">
    <div class="container">
        <div class="section-title">
            <h2>Our Design Process</h2>
            <p>From concept to delivery, we ensure a seamless experience.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>1. Discovery</h4>
                    <p>Understand your brand, goals, and target audience.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>2. Conceptualization</h4>
                    <p>Create initial design concepts based on your brief.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>3. Refinement</h4>
                    <p>Incorporate feedback to finalize the design.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>4. Delivery</h4>
                    <p>Provide high-quality files ready for use.</p>
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

