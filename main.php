<?php
// Start session to check if the user is logged in
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to login page
    exit();
}

// Handle logout when the user clicks the logout button
if (isset($_GET['logout'])) {
    // Unset all session variables and destroy the session
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redirect to login page after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>PorMe Maker</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-tale-seo-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <!-- Custom Neon Purple Button Styles -->
    <style>
        /* Custom Neon Purple Button Styles */
        .btn-neon-purple {
            background-color: #9b30ff; /* Neon purple background */
            color: white; /* White text */
            border: 2px solid #9b30ff; /* Border with the same neon purple color */
            text-shadow: 0 0 5px #9b30ff, 0 0 10px #9b30ff, 0 0 15px #9b30ff; /* Glowing effect */
            transition: all 0.3s ease;
        }

        .btn-neon-purple:hover {
            background-color: transparent; /* Transparent on hover */
            color: #9b30ff; /* Neon purple text color on hover */
            border: 2px solid #9b30ff; /* Keep the neon purple border on hover */
            box-shadow: 0 0 20px #9b30ff, 0 0 30px #9b30ff, 0 0 40px #9b30ff; /* Glowing effect on hover */
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Pre-Header Area Start ***** -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-9">
                    <div class="left-info">
                        <ul>
                            <li><a href="#"><i class="fa fa-phone"></i>09123456789</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>pormemaker@email.com</a></li>
                            <li><a href="#"><i class="fa fa-map-marker"></i>PSU SAN CARLOS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Pre-Header Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- Removed the <a> tag and just displayed the "PorMe" text -->
                        <div class="logo">
                            <h1 style="font-size: 36px; color: #fff; font-weight: bold;">APT</h1>
                        </div>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            
                            <!-- Logout Button in Nav -->
                            <li><a href="?logout=true" class="logout-btn" style="color: white;">Logout</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Main Banner Section -->
    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="caption header-text">
                        <h6>PorMe Company</h6>
                        <div class="line-dec"></div>
                        <h4>Dive <em>Into The BASIC</em> World <span>With Apateu</span></h4>
                        <p>APT is the best portfolio and resume maker, for creating portfolio please use admin account first:[Username:admin, Pass:admin123]</p>
                        
                        <!-- Transform "Create Portfolio" and "Make Resume" into neon purple buttons -->
                        <a href="freelance/admin/login.php" class="btn btn-neon-purple main-button">Create Portfolio</a>

                        <span>or</span>
                        <a href="cv/builder.php" class="btn btn-neon-purple second-button">Make Resume</a>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="services section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h2>Your Information Is <em>HIGHLY SECURED</em> &amp;
                                    <span>Generate Accurate Info</span> For Your Application</h2>
                                <div class="line-dec"></div>
                                <p>THANK YOU FOR USING APT.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <img src="assets/images/services-01.jpg" alt="discover SEO" class="templatemo-feature">
                                </div>
                                <h4>100% Your Application Approved!</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <img src="assets/images/services-02.jpg" alt="data analysis" class="templatemo-feature">
                                </div>
                                <h4>Always Updated and Real Time Generator</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 3030 <a href="#">Apt Apt</a>. All rights reserved. 
                <br>Design: <a href="https//angeline.com" target="_blank">Purple Angeline.com</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>
