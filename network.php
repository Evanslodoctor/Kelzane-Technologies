
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
                    <h1>Reliable <span>Network & Infrastructure Design</span> Services</h1>
                    <p>Creating robust and scalable networks to support your business operations.</p>
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
                    <p>We design and implement high-performance, secure, and scalable networks that align with your business needs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Our Network & Infrastructure Design Services Include:</h2>
                <ul class="list">
                    <li><i class="fa fa-caret-right"></i> Network Planning and Design</li>
                    <li><i class="fa fa-caret-right"></i> LAN/WAN Setup and Configuration</li>
                    <li><i class="fa fa-caret-right"></i> Network Security Solutions</li>
                    <li><i class="fa fa-caret-right"></i> Network Optimization</li>
                    <li><i class="fa fa-caret-right"></i> Wireless Network Deployment</li>
                    <li><i class="fa fa-caret-right"></i> VoIP and Telecommunication Systems</li>
                    <li><i class="fa fa-caret-right"></i> Server and Storage Solutions</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="img/other services/networking1.jpg" alt="Network & Infrastructure Design">
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
                    <h2>Benefits of Choosing Our Network & Infrastructure Design Services</h2>
                    <p>Build a resilient and efficient network that drives business success.</p>
                </div>
            </div>
        </div>
        <ul class="list">
            <li><i class="fa fa-caret-right"></i> Improved network performance</li>
            <li><i class="fa fa-caret-right"></i> Enhanced data security and protection</li>
            <li><i class="fa fa-caret-right"></i> Scalable and future-proof solutions</li>
            <li><i class="fa fa-caret-right"></i> Increased uptime and reliability</li>
            <li><i class="fa fa-caret-right"></i> Reduced operational costs through optimized infrastructure</li>
        </ul>
    </div>
</section>

<!-- Our Process -->
<section class="our-process section">
    <div class="container">
        <div class="section-title">
            <h2>How We Work</h2>
            <p>We follow a structured process to ensure the successful implementation of network and infrastructure solutions.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>1. Consultation</h4>
                    <p>We assess your network needs and business objectives.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>2. Site Assessment</h4>
                    <p>We analyze your current infrastructure and site conditions.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>3. Solution Design</h4>
                    <p>We create a network design tailored to your needs and budget.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>4. Implementation</h4>
                    <p>We deploy the network solution and ensure smooth operation.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Case Studies Section -->
<section class="our-process section">
    <div class="container">
        <div class="section-title">
            <h2>Our Case Studies</h2>
            <p>Discover how we’ve helped businesses enhance their network infrastructure.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>1. Corporate Network Overhaul</h4>
                    <p>We helped a large enterprise upgrade their network to improve scalability and security.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>2. Remote Office Integration</h4>
                    <p>Designed and deployed a secure network for a distributed workforce.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>3. Cloud-Based Infrastructure</h4>
                    <p>We migrated a business’s infrastructure to the cloud for better flexibility and lower costs.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <h4>4. Retail Network Expansion</h4>
                    <p>We supported a retail chain in expanding its network infrastructure across multiple locations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<<?php
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

