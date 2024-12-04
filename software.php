
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
                    <h1>Crafting Scalable <span>Software & Web Solutions</span></h1>
                    <p>We specialize in creating robust, scalable, and innovative software and web solutions that
                       empower businesses to thrive in the digital era.</p>
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
                    <h2>Comprehensive Software & Web Development Services</h2>
                    <p>From concept to deployment, we offer tailored development solutions that align with your unique
                       business needs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Why Choose Us?</h2>
                  <p>We deliver cutting-edge software and web solutions that drive growth, improve user engagement, and maximize your return on investment.</p>
                <ul class="list">
                    <li><i class="fa fa-caret-right"></i> Custom software development</li>
                    <li><i class="fa fa-caret-right"></i> Responsive web design and development</li>
                    <li><i class="fa fa-caret-right"></i> E-commerce platforms and CMS solutions</li>
                    <li><i class="fa fa-caret-right"></i> Mobile application development</li>
                    <li><i class="fa fa-caret-right"></i> API integration and backend services</li>
                    <li><i class="fa fa-caret-right"></i> Cloud-based solutions and SaaS platforms</li>
                    <li><i class="fa fa-caret-right"></i> Database design, optimization, and management</li>
                    <li><i class="fa fa-caret-right"></i> UI/UX design and prototyping</li>
                    <li><i class="fa fa-caret-right"></i> Performance optimization and scalability solutions</li>
                    <li><i class="fa fa-caret-right"></i> Maintenance, support, and system upgrades</li>
                    <li><i class="fa fa-caret-right"></i> Business intelligence and data analytics solutions</li>
                    
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="img/software/software-development.jpg" alt="Software Development">
            </div>
        </div>
    </div>
</section>



<section class="technologies section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Projects We’ve Delivered</h2>
                    <p>Our team leverages cutting-edge tools and frameworks to deliver outstanding results in software development.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            // Include the functions file and retrieve projects
            // include('functions.php');

            // Fetch projects for the "Software Development" service
            $projects = getProjectsByServiceName('Software & Web Development');

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
                        <p>No projects found for Software Development.</p>
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
                    <h2>Transparent Pricing Plans</h2>
                    <p>Choose a plan that fits your project requirements.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div class="single-table">
                    <div class="table-head">
                        <h4>Starter</h4>
                        <div class="price">
                            <p>Ksh: 10,000 - Ksh: 35,000<span>/ Project</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> Basic web design</li>
                        <li><i class="fa fa-check"></i> Up to 10 pages</li>
                        <li><i class="fa fa-check"></i> Email support</li>
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
                        <h4>Business</h4>
                        <div class="price">
                            <p>Ksh: 35,000 - Ksh: 75,000<span>/ Project</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> Advanced design & features</li>
                        <li><i class="fa fa-check"></i> Up to 20 pages</li>
                        <li><i class="fa fa-check"></i> Payment integration</li>
                        <li><i class="fa fa-check"></i> Phone support</li>
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
                        <h4>Enterprise</h4>
                        <div class="price">
                            <p>Ksh: 75,000 and above, <span>/ Project</span></p>
                        </div>
                    </div>
                    <ul class="table-list">
                        <li><i class="fa fa-check"></i> Custom enterprise solutions</li>
                        <li><i class="fa fa-check"></i> Unlimited pages</li>
                        <li><i class="fa fa-check"></i> Payment integration</li>
                        <li><i class="fa fa-check"></i> 24/7 priority support</li>
                    </ul>
                    <div class="table-bottom">
                        <a href="request-service.php" class="btn">Request Service</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Inquiry Section -->
<section id="contact" class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form class="form" action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <input name="name" type="text" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-6">
                            <input name="email" type="email" placeholder="Your Email" required>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="message" placeholder="Tell us about your project..." required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn">Submit Inquiry</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="img/contact-img.png" alt="Contact Kelzen Technologies">
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>