<?php include 'userSessionStart.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parish of San Juan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="userHomepage.css">

    <!-- Facebook SDK -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0"></script>
    <div id="fb-root"></div>
    
    <script>
        function readmore() { window.location.href = 'userAbout.php'; }
        function btnservices() { window.location.href = 'userService.php'; }
        function massSchedule() { window.location.href = 'userPrivateMass.php'; }
        function contactUs() { window.location.href = 'userContactUs.php'; }
        function sacraments() { window.location.href = 'newUserSacraments.php'; }
        function igopen(event) {
            event.preventDefault();
            window.open("https://www.instagram.com/angtinigsjbp/", '_blank');
        }
        function fbopen(event) {
            event.preventDefault();
            window.open("https://www.facebook.com/parokyangsanjuanhagonoy/", '_blank');
        }
    </script>

    <style>
        /* Styles for consistent carousel sizing */
        #imageCarousel .carousel-inner {
            width: 100%;
            height: 350px;
            overflow: hidden;
        }
        
        #imageCarousel .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Custom styling for sections */
        .welcome-section, .mass-schedule-section, .sacraments-section, .video-section, .services-offered-section, .contact-section, .social-section {
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        /* Alternating colors for sections */
        .mass-schedule-section, .video-section, .contact-section{
            background-color: rgba(255, 0, 0, 0.6);
        }

        .carousel-controls {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        
        /* Contact Section */
        .contact-section img {
            width: 50px;
        }

        .welcome-section.bg-white {
            background-color: transparent;
        }

        .container {
            padding: 0 50px;
            margin-top: 125px;
        }

        #forGallery {
            padding: 0 40px;
        }
        
    </style>

</head>
<body>
    <header style="margin-bottom: 200px;">
        <?php include 'userHeader.php'; ?>
    </header>
    <div class="container">
        <!-- Welcome Section -->
        <div class="row align-items-center text-center my-5 welcome-section bg-white">
            <div class="col-md-6 mb-3 mb-md-0 position-relative">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../Images/3.jpg" class="d-block w-100" alt="Church Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="../Images/5.jpg" class="d-block w-100" alt="Church Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="../Images/4.png" class="d-block w-100" alt="Church Image 3">
                        </div>
                        <div class="carousel-item">
                            <img src="../Images/6.jpg" class="d-block w-100" alt="Church Image 4">
                        </div>
                        <div class="carousel-item">
                            <img src="../Images/2.jpg" class="d-block w-100" alt="Church Image 5">
                        </div>
                        <div class="carousel-item">
                            <img src="../Images/1.jpg" class="d-block w-100" alt="Church Image 6">
                        </div>
                    </div>

                    <a class="carousel-control-prev carousel-controls" href="#imageCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next carousel-controls" href="#imageCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Welcome to our Parish</h2>
                <p>Parokya ng San Juan Bautista is a Catholic church located in San Juan, Hagonoy, Bulacan. It is part of the Diocese of Malolos, established in 1947. The Parish Fiesta is celebrated every 24th day of June.</p>
                <button class="btn btn-secondary" onclick="readmore()">Read More...</button>
            </div>
        </div>

        <!-- Mass Schedule Section with Transparent Dark Red Background -->
        <div class="row align-items-center text-center my-5 mass-schedule-section">
            <div class="col-md-6">
                <h2 class="text-light">SET APPOINTMENT</h2>
                <p class="text-light">Services Offered: <br><br> Funeral Mass <br> House Blessings <br> Business Blessings <br> Car Blessings <br> Religious Item Blessing <br> Anointing of the Sick</p>
                <button class="btn btn-secondary mt-4" onclick="massSchedule()">SET APPOINTMENT</button>
            </div>
            <div class="col-md-6">
                <a href="#" data-bs-toggle="modal" data-bs-target="#massScheduleModal">
                    <img src="../Images/schedule.jpg" class="img-fluid" alt="Mass Schedule Image">
                    <h3 class="text-light mt-3">View Mass Schedule</h3>
                </a>
            </div>
        </div>

        <!-- Modal for Mass Schedule Image -->
        <div class="modal fade" id="massScheduleModal" tabindex="-1" aria-labelledby="massScheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <img src="../Images/schedule.jpg" class="img-fluid w-100" alt="Mass Schedule Image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sacraments Section -->
        <div class="row align-items-center text-center my-5 sacraments-section bg-white">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="../Images/sacraments.jpg" class="img-fluid" alt="Sacraments Image" style="width: 100%; height: auto;">
            </div>
            <div class="col-md-6">
                <p>
                    1. BAPTISM<br>2. CONFIRMATION<br>3. EUCHARIST (HOLY COMMUNION)<br>4. RECONCILIATION (PENANCE OR CONFESSION)<br>5. ANNOINTING OF THE SICK<br>6. MATRIMONY (MARRIAGE) <br>7. HOLY ORDERS
                </p>
                <button class="btn btn-secondary mt-4" onclick="sacraments()">Read About Sacraments..</button>
            </div>
        </div>

        <!-- Event Section -->
        <div class="row align-items-center text-center my-5 video-section">
            <div class="col-md-6">
                <h1 class="text-light">SCHEDULE OF EVENTS</h1>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
            <div class="col-md-6">
                <h4 class="text-light">NEWS AND EVENTS</h4>
                 <img src="../Images/eventsPic.jpg" class="img-fluid" alt="Event Image" style="width: 450px; height: 450px;">
            </div>
        </div>

        <!-- Services Offered Section -->
        <div class="row align-items-center text-center my-5 services-offered-section">
            <div class="col-md-6">
                <img src="../Images/servicePic.jpg" class="img-fluid" alt="Services Image">
            </div>
            <div class="col-md-6">
                <h2>What We Offer</h2>
                <button class="btn btn-primary" onclick="btnservices()">View Services Offered</button>
            </div>
        </div>

        <!-- Contact Us Section -->
        <div class="row align-items-center text-center my-5 contact-section">
            <div class="col-md-6">
                <button class="btn btn-secondary" onclick="contactUs()">Contact Us</button>
            </div>
            <div class="col-md-6">
                <a href="#" onclick="fbopen(event)" class="btn btn-primary">
                    <i class="fa fa-facebook"></i> Facebook
                </a>
                <a href="#" onclick="igopen(event)" class="btn btn-danger">
                    <i class="fa fa-instagram"></i> Instagram
                </a>
            </div>
        </div>
    </div>
</body>
</html>
