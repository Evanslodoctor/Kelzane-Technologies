
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
                    <h1>Expert <span>CCTV Installation & Surveillance</span></h1>
                    <p>Protect your property with state-of-the-art CCTV systems tailored to your needs. From installation to maintenance, we've got you covered.</p>
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
                    <h2>Comprehensive CCTV Installation Services</h2>
                    <p>We provide professional-grade surveillance solutions to ensure your property stays secure 24/7.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Why Choose Us?</h2>
                <p>Our team delivers cutting-edge surveillance solutions designed for maximum reliability and performance.</p>
                <ul class="list">
                    <li><i class="fa fa-caret-right"></i> Professional installation of wired and wireless systems</li>
                    <li><i class="fa fa-caret-right"></i> High-definition cameras for crystal-clear footage</li>
                    <li><i class="fa fa-caret-right"></i> Remote monitoring via mobile and desktop</li>
                    <li><i class="fa fa-caret-right"></i> Motion detection and alerts setup</li>
                    <li><i class="fa fa-caret-right"></i> Night vision and weatherproof cameras</li>
                    <li><i class="fa fa-caret-right"></i> Ongoing maintenance and upgrades</li>
                    <li><i class="fa fa-caret-right"></i> Scalable solutions for homes, offices, and large enterprises</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="img/video-bg" alt="CCTV Installation">
            </div>
        </div>
    </div>
</section>


<!-- Portfolio Section -->
<section class="portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Recent CCTV Projects</h2>
                    <p>Explore some of our completed surveillance system installations.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row">
            <?php
            // Include the functions file and retrieve projects
            // include('functions.php');

            // Fetch projects for the "Software Development" service
            $projects = getProjectsByServiceName('CCTV Installation');

            // Check if any projects were retrieved
            if (!empty($projects)) {
                foreach ($projects as $project) {
                    echo '<div class="col-lg-4 col-md-6">
                            <div class="project-item">
                                <img src="' . htmlspecialchars($project['image_url']) . '" alt="' . htmlspecialchars($project['title']) . '">
                                <h4>' . htmlspecialchars($project['title']) . '</h4>
                                <p>' . htmlspecialchars($project['description']) . '</p>
                            </div>
                          </div>';
                }
            } else {
                echo '<div class="col-lg-12">
                        <p>No recent projects found for CCTV Installation.</p>
                      </div>';
            }
            ?>
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
                    <p>Select a plan that suits your surveillance needs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div class="single-table">
                    <div class="table-head">
                        <h4>Basic</h4>
                        <div class="price">
                            <p> Ksh. 21,650 - 85,450<span>/ Installation</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> 3 - 16 cameras</li>
                        <li><i class="fa fa-check"></i> Mobile app setup</li>
                        <li><i class="fa fa-check"></i> Basic motion detection</li>
                    </ul>
                    <div class="table-bottom">
                        <a href="request-service.php" class="btn">Request Service</a>
                    </div>
                </div>
            </div>
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div class="single-table">
                    <div class="table-head">
                        <h4>Advanced</h4>
                        <div class="price">
                            <p>Ksh. 41,700 - Ksh. 164,400<span>/ Installation</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> 4 - 16 cameras</li>
                        <li><i class="fa fa-check"></i> Remote monitoring</li>
                        <li><i class="fa fa-check"></i> Night vision</li>
                    </ul>
                    <div class="table-bottom">
                        <a href="request-service.php" class="btn">Request Service</a>
                    </div>
                </div>
            </div>
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div class="single-table">
                    <div class="table-head">
                        <h4>Premium</h4>
                        <div class="price">
                            <p>Ksh 43,650 - Ksh. 176,400<span>/ Installation</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> 4 - 16 cameras</li>
                        <li><i class="fa fa-check"></i> Full HD recording</li>
                        <li><i class="fa fa-check"></i> 24/7 priority support</li>
                    </ul>
                    <div class="table-bottom">
                        <a href="request-service.php" class="btn">Request Service</a>
                    </div>
                </div>
                </div>

                <div class="section-title">
                <p>NB: We charge 1,500 per camera for installation - Monitor/TV screen is not included in the package.</p>
          
            </div>
        </div>
    </div>

<!-- FAQ Section -->

<!-- Case Studies Section -->
<section class="case-studies section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Success Stories</h2>
                    <p>Discover how our CCTV solutions have helped businesses and individuals enhance their security.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Case Study -->
            <div class="col-lg-4 col-md-6">
                <div class="single-case-study">
                    <img src="img/casestudies/office-security.jpg" alt="Office Security">
                    <h4>Office Security Upgrade</h4>
                    <p>We installed a comprehensive surveillance system for a corporate client, reducing incidents by 70%.</p>
                </div>
            </div>
            <!-- Single Case Study -->
            <div class="col-lg-4 col-md-6">
                <div class="single-case-study">
                    <img src="img/casestudies/retail.jpg" alt="Retail Surveillance">
                    <h4>Retail Surveillance</h4>
                    <p>Our tailored solution helped a retail business monitor activities, preventing shoplifting and fraud.</p>
                </div>
            </div>
            <!-- Single Case Study -->
            <div class="col-lg-4 col-md-6">
                <div class="single-case-study">
                    <img src="img/casestudies/home-security.jpg" alt="Home Security">
                    <h4>Enhanced Home Security</h4>
                    <p>A residential client gained peace of mind with our easy-to-use CCTV system and remote access.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications and Partnerships Section -->
<section class="certifications section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Certifications and Partnerships</h2>
                    <p>We work with industry leaders to bring you the best in security technology.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="partner-logos">
                    <li><img src="img/partners/hikvision.png" alt="Hikvision"></li>
                    <li><img src="img/partners/dahua.png" alt="Dahua"></li>
                    <li><img src="img/partners/cisco.png" alt="Cisco"></li>
                </ul>
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

