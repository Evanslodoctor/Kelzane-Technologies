

<?php
include 'header.php';

// Include the CRUD operations file
require 'crud_operations.php';

// Get the projects
$projects = viewProjects();  // Fetch the projects using the view function
?>


<!-- Technical Support Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="text">
                    <h1>Reliable <span>Technical Support Services</span></h1>
                    <p>Empowering businesses with fast, effective, and comprehensive technical support solutions to minimize downtime and ensure smooth operations.</p>
                    <div class="button">
                        <a href="request-service.php" class="btn">Request Service</a>
                        <a href="#pricing" class="btn primary">View Pricing</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technical Support Overview -->
<section class="service-overview section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Comprehensive Technical Support Services</h2>
                    <p>We offer end-to-end support solutions to resolve technical challenges quickly and efficiently, enabling your business to thrive without interruptions.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>What Makes Our Technical Support Stand Out?</h2>
                <p>From troubleshooting to proactive system monitoring, our support services are designed to keep your systems running at peak performance.</p>
                <ul class="list">
                    <li><i class="fa fa-caret-right"></i> On-site and remote technical support</li>
                    <li><i class="fa fa-caret-right"></i> Network setup and maintenance</li>
                    <li><i class="fa fa-caret-right"></i> Hardware and software troubleshooting</li>
                    <li><i class="fa fa-caret-right"></i> System performance optimization</li>
                    <li><i class="fa fa-caret-right"></i> Data recovery and backup solutions</li>
                    <li><i class="fa fa-caret-right"></i> IT helpdesk services</li>
                    <li><i class="fa fa-caret-right"></i> Security updates and patch management</li>
                    <li><i class="fa fa-caret-right"></i> Device setup and integration</li>
                    <li><i class="fa fa-caret-right"></i> Training and technical guidance</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="img/technicalsupport/technical-support.jpg" alt="Technical Support">
            </div>
        </div>
    </div>
</section>

<!-- Benefits of Choosing Us -->
<section class="benefits section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Why Choose Us?</h2>
                    <p>Our technical support team delivers tailored solutions that enhance productivity, reduce downtime, and provide peace of mind.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-benefit">
                    <h4>24/7 Availability</h4>
                    <p>We’re here to assist you anytime, ensuring uninterrupted business operations.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-benefit">
                    <h4>Certified Experts</h4>
                    <p>Our team of highly skilled professionals ensures top-notch solutions every time.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-benefit">
                    <h4>Proactive Monitoring</h4>
                    <p>We detect and resolve issues before they become problems, saving you time and money.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="pricing-table section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Flexible Pricing Plans</h2>
                    <p>Choose a plan that fits your business needs and budget.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div class="single-table">
                    <div class="table-head">
                        <h4>Basic Support</h4>
                        <div class="price">
                            <p>Ksh: 5,000 - 30,000<span>/ Month</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> Remote support</li>
                        <li><i class="fa fa-check"></i> Basic troubleshooting</li>
                        <li><i class="fa fa-check"></i> Email support</li>
                    </ul>
                    <div class="table-bottom">
                        <a href="request-service.php" class="btn">Get Started</a>
                    </div>
                </div>
            </div>
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div class="single-table">
                    <div class="table-head">
                        <h4>Premium Support</h4>
                        <div class="price">
                            <p>Ksh: 31,000 - Ksh: 70,000<span>/ Month</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> On-site support</li>
                        <li><i class="fa fa-check"></i> Advanced troubleshooting</li>
                        <li><i class="fa fa-check"></i> Security patches</li>
                    </ul>
                    <div class="table-bottom">
                        <a href="request-service.php" class="btn">Get Started</a>
                    </div>
                </div>
            </div>
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div class="single-table">
                    <div class="table-head">
                        <h4>Enterprise Support</h4>
                        <div class="price">
                            <p>Ksh: 70,000 and above<span>/ Month</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> 24/7 priority support</li>
                        <li><i class="fa fa-check"></i> Proactive monitoring</li>
                        <li><i class="fa fa-check"></i> Tailored solutions</li>
                    </ul>
                    <div class="table-bottom">
                        <a href="request-service.php" class="btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Performance Metrics -->
<section class="performance-metrics section">
    <div class="container">
        <div class="section-title">
            <h2>Our Performance Guarantees</h2>
            <p>We measure success through reliability and customer satisfaction.</p>
        </div>
        <ul class="list">
            <li><i class="fa fa-check-circle"></i> Average response time: <strong>30 minutes</strong></li>
            <li><i class="fa fa-check-circle"></i> Customer satisfaction rate: <strong>98%</strong></li>
            <li><i class="fa fa-check-circle"></i> 99.9% uptime guarantee</li>
        </ul>
    </div>
</section>

<!-- Case Studies Section -->
<!-- Our Process -->
<section class="our-process section">
    <div class="container">
        <div class="section-title">
            <h2>Our Process</h2>
            <p>A seamless process to resolve technical issues and maintain operational efficiency.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>1. Diagnosis</h4>
                    <p>Identify the root cause of the issue through thorough analysis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>2. Plan</h4>
                    <p>Develop a solution plan tailored to the problem.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>3. Execute</h4>
                    <p>Implement the solution to resolve the issue promptly.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>4. Monitor</h4>
                    <p>Perform follow-ups to ensure the problem is resolved completely.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Contact Section -->
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

