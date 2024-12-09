
<?php
// Include the database connection
global $pdo;
include 'db_connection.php'; // Ensure this is the correct path

// Function to check if the visitor is new for the session
function isNewVisitor() {
    if (!isset($_COOKIE['visitor_session'])) {
        // Generate a unique identifier for this session
        $sessionId = uniqid('visitor_', true);
        setcookie('visitor_session', $sessionId, 0, '/'); // Cookie expires when the browser is closed
        return true;
    }
    return false;
}

if (isNewVisitor()) {
    try {
        // Get the current month
        $currentMonth = date('F'); // Example: "December"

        // Check if an entry for the current month exists in the statistics table
        $query = "SELECT * FROM statistics WHERE month = :month";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':month' => $currentMonth]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Update the new visitors count for the current month
            $updateQuery = "UPDATE statistics SET new_visitors = new_visitors + 1 WHERE month = :month";
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->execute([':month' => $currentMonth]);
        } else {
            // If it's a new month, insert a new row with initial counts
            // Insert a new row for the current month with initial counts
            $insertQuery = "INSERT INTO statistics (month, subscribers, new_visitors, active_users) VALUES (:month, 0, 1, 0)";
            $insertStmt = $pdo->prepare($insertQuery);
            $insertStmt->execute([':month' => $currentMonth]);
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function incrementSubscriberCount() {
    try {
        // Get the current month
        $currentMonth = date('F');

        // Check if an entry for the current month exists
        $query = "SELECT * FROM statistics WHERE month = :month";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':month' => $currentMonth]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Update the subscribers count for the current month
            $updateQuery = "UPDATE statistics SET subscribers = subscribers + 1 WHERE month = :month";
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->execute([':month' => $currentMonth]);
        } else {
            // Insert a new row for the current month with initial counts
            $insertQuery = "INSERT INTO statistics (month, subscribers, new_visitors, active_users) VALUES (:month, 1, 0, 0)";
            $insertStmt = $pdo->prepare($insertQuery);
            $insertStmt->execute([':month' => $currentMonth]);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Example of where the function could be triggered (e.g., when a user subscribes)
if (isset($_POST['subscribe'])) {
    // Trigger the subscriber count increment
    incrementSubscriberCount();
    // Process the subscription here (e.g., save user data, etc.)
    echo "Thank you for subscribing!";
}

?>



<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="Kelzane Technologies, ICT solutions, software development, networking solutions, technical support">
<meta name="description" content="Kelzane Technologies provides innovative and sustainable technology solutions to empower businesses and transform communities.">
<meta name='copyright' content='Kelzane Technologies'>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Title -->
<title>Kelzane Technologies - Empowering Businesses with Innovative Technology Solutions</title>

<!-- Favicon -->
<link rel="icon" href="img/favicon.png">

<!-- Google Fonts -->
<link href="https://maps.app.goo.gl/VvPWEpEvBuPS23WH8" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="css/nice-select.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- icofont CSS -->
<link rel="stylesheet" href="css/icofont.css">
<!-- Slicknav -->
<link rel="stylesheet" href="css/slicknav.min.css">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="css/owl-carousel.css">
<!-- Datepicker CSS -->
<link rel="stylesheet" href="css/datepicker.css">
<!-- Animate CSS -->
<link rel="stylesheet" href="css/animate.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="css/magnific-popup.css">

<!-- Kelzane CSS -->
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/responsive.css">

</head>
<body>

<!-- Preloader -->
<!-- <div class="preloader">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="indicator"> 
            <svg width="16px" height="12px">
                <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
            </svg>
        </div>
    </div>
</div> -->
<!-- End Preloader -->

<!-- Header Area -->
<header class="header">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-12">
					
                    <!-- Contact -->
                    <ul class="top-link">
                        <li><a href="about_us">About</a></li>
                        <li><a href="services">Services</a></li>
                        <li><a href="portfolio-details">Portfolio</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                    <!-- End Contact -->
                </div>
                <div class="col-lg-6 col-md-7 col-12">
                    <!-- Top Contact -->
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i>+254 700 000 000</li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:contact@Kelzanetech.com">contact@kelzanenetech.com</a></li>
                    </ul>
                    <!-- End Top Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->

			<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <!-- Start Logo -->
                    <div class="logo">
                        <a href="index"><img src="img/logo1.png" alt="Kelzane Technologies Logo"></a>
                    </div>
                    <!-- End Logo -->
                    <!-- Mobile Nav -->
                    <div class="mobile-nav"></div>
                    <!-- End Mobile Nav -->
                </div>
                <div class="col-lg-7 col-md-9 col-12">
                    <!-- Main Menu -->
                    <div class="main-menu">
                        <nav class="navigation">
                            <ul class="nav menu">
                                <li class="active"><a href="index">Home</a></li>
                                <li><a href="about_us">About Us</a></li>
                                <li><a href="services">Services</a></li>
                                <li><a href="portfolio-details">Portfolio</a></li>
                                <li><a href="blog">Blog</a></li>
                                <li><a href="contact">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End Main Menu -->
                </div>
                <div class="col-lg-2 col-12">
                    <div class="get-quote">
                        <a href="questions" class="btn">Visit FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Inner -->
</header>