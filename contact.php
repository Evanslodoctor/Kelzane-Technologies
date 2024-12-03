<?php
include 'header.php';
require 'crud_operations.php';
?>
	
		<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Contact Us</h2>
                    <ul class="bread-list">
                        <li><a href="index.html">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
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



            <div class="contact-us-left">
    <!-- Start Google Map Embed -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31910.694714869907!2d36.742226349999996!3d-1.2708986500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f199c5c5b282b%3A0x80e9e2429e405793!2sKangemi%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1733219390904!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- End Google Map Embed -->
</div>

            </div>
        </div>
    </div>
</section>

<!-- Start Contact Us -->
<section class="contact-us section">
    <div class="container">
        <div class="inner">
            <div class="row"> 
                
        <div class="contact-info">
            <div class="row">
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont icofont-ui-call"></i>
                        <div class="content">
                            <h3>+(254) 716 687 910</h3>
                            <p>contact@kelzanetech.com</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont-google-map"></i>
                        <div class="content">
                            <h3>123 Tech Street</h3>
                            <p>Nairobi, Kenya</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont icofont-wall-clock"></i>
                        <div class="content">
                            <h3>Mon - Sat: 8am - 5pm</h3>
                            <p>Sunday Closed</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Us -->
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