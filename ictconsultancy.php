
<?php
include 'header.php';

// Include the CRUD operations file
require 'crud_operations.php';

// Get the projects
$projects = viewProjects();  // Fetch the projects using the view function
?>

 <!-- ICT Consultancy Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="text">
                    <h1>Expert <span>ICT Consultancy Services</span></h1>
                    <p>Kelzane Technologies provides comprehensive ICT consultancy to help businesses achieve their goals through cutting-edge technology strategies.</p>
                    <div class="button">
                        <a href="request-service.php" class="btn">Request Consultation</a>
                        
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
                    <h2>Comprehensive ICT Consultancy Services</h2>
                    <p>We offer tailored ICT solutions to streamline your operations, enhance productivity, and secure your digital assets.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Why Choose Us?</h2>
                <p>Our experts provide actionable insights and solutions to help businesses harness the power of technology effectively.</p>
                <ul class="list">
                    <li><i class="fa fa-caret-right"></i> IT infrastructure assessment and planning</li>
                    <li><i class="fa fa-caret-right"></i> Cybersecurity strategies and solutions</li>
                    <li><i class="fa fa-caret-right"></i> Cloud computing and migration services</li>
                    <li><i class="fa fa-caret-right"></i> Business process automation</li>
                    <li><i class="fa fa-caret-right"></i> Network design and optimization</li>
                    <li><i class="fa fa-caret-right"></i> Data management and analytics</li>
                    <li><i class="fa fa-caret-right"></i> IT project management</li>
                    <li><i class="fa fa-caret-right"></i> Disaster recovery and backup planning</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="img/ICT/ICT-Consultancy.jpg" alt="ICT Consultancy Services">
            </div>
        </div>
    </div>
</section>



<!-- Benefits Section -->
<section class="benefits section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Benefits of Partnering with Us</h2>
                    <p>We ensure our clients experience tangible improvements in their IT infrastructure and business processes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-benefit">
                    <h4>Cost Efficiency</h4>
                    <p>Optimize IT spending and reduce unnecessary overheads.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-benefit">
                    <h4>Enhanced Security</h4>
                    <p>Mitigate risks with robust cybersecurity measures and policies.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-benefit">
                    <h4>Future-Ready Solutions</h4>
                    <p>Leverage scalable and adaptable technologies that grow with your business.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Case Studies Section -->
<section class="case-studies ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Success Stories</h2>
                    <p>Learn how we’ve helped businesses like yours achieve remarkable results.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-case">
                    <h4>Retail Chain Transformation</h4>
                    <p>We helped a leading retail chain migrate to the cloud, reducing operational costs by 30%.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-case">
                    <h4>Cybersecurity Overhaul</h4>
                    <p>A manufacturing firm improved its network security, preventing data breaches.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-case">
                    <h4>Process Automation</h4>
                    <p>An SME saved hundreds of hours by automating repetitive tasks using our solutions.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Industries We Serve Section -->
<section class="industries section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Industries We Serve</h2>
                    <p>Our ICT solutions cater to businesses across a wide range of industries.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <h4>Healthcare</h4>
                <p>Streamlining patient data management and enhancing system security.</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4>Retail</h4>
                <p>Implementing cloud-based POS systems and inventory solutions.</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4>Finance</h4>
                <p>Optimizing IT systems for compliance and risk management.</p>
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

