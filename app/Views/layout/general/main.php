<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Labolatorium Fisika Universitas Islam Negeri Bandung">
  <link href="/assets/img/icon-150x150.png" rel="icon" sizes="32x32">
  <link href="/assets/img/icon-300x300" rel="icon" sizes="192x192">
  <title>Labolatorium Fisika</title>

  <link
    href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="/assets/general/css/libraries.css">
  <link rel="stylesheet" href="/assets/general/css/style.css">
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    <!-- =========================
        Header
    =========================== -->
    <header class="header header-layout1">
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="">
            <img src="/assets/img/logo.png" class="logo-dark" alt="logo" height="65px" width="auto">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="mainNavigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="contact-us.html" class="nav-item-link">Beranda</a>
              </li><!-- /.nav-item -->
              <li class="nav-item">
                <a href="contact-us.html" class="nav-item-link">Labolatorium</a>
              </li><!-- /.nav-item -->
              <li class="nav-item">
                <a href="contact-us.html" class="nav-item-link">Beranda</a>
              </li><!-- /.nav-item -->
              <li class="nav-item">
                <a href="contact-us.html" class="nav-item-link">Contacts</a>
              </li><!-- /.nav-item -->
            </ul><!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div><!-- /.navbar-collapse -->
          <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <div class="contact-phone d-flex align-items-center">
              <div class="" style="border-radius: 50%; border: 2px solid #f4572e;height: 30px; width: 30px;overflow: hidden; margin-right: 10px">
                <img src="/assets/img/userprofile.jpg" alt="profile" height="30" width="30"
                    style="object-fit: contain;object-position: center;height: 30px; width: 30px;">
              </div>
              <div>
                <a class="d-block fw-bold active" href="tel:00201061245741" style="font-weight: bold;">Login</a>
              </div>
            </div>
          </div>
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->

    <!-- ============================
        Slider
    ============================== -->
    <div style="min-height: 90vh">
      <?= $content ?>
    </div>

    <!-- ========================
      Footer
    ========================== -->
    <footer class="footer">
      <div class="footer-primary">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
              <div class="footer-widget-contact">
                <h6 class="footer-widget-title">Quick Contacts</h6>
                <p>If you have any questions or need help, feel free to contact with our team.</p>
                <ul class="contact-list list-unstyled">
                  <li>
                    <a href="mailto:provetta@7oroof.com">
                      <i class="contact-icon icon-email"></i> <span>provetta@7oroof.com</span>
                    </a>
                  </li>
                  <li>
                    <a href="tel:00201061245741">
                      <i class="contact-icon icon-phone"></i> <span>(002) 01061245741</span>
                    </a>
                  </li>
                </ul>
                <p>2307 Beverley Rd Brooklyn, New York 11226 United States.</p>
                <a href="contact-us.html" class="btn btn-white btn-link mr-30">
                  <i class="fas fa-map-marker-alt"></i> <span>Get Directions</span>
                </a>
              </div>
            </div><!-- /.col-xl-2 -->
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="footer-widget-nav">
                <h6 class="footer-widget-title">About Us</h6>
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="team.html">Leadership Team</a></li>
                    <li><a href="blog.html">News & Media</a></li>
                    <li><a href="services.html">Sustainability</a></li>
                    <li><a href="careers.html">Careers</a></li>
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="footer-widget-nav">
                <h6 class="footer-widget-title">Tests & Services</h6>
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="#">General Diagnostic Tests</a></li>
                    <li><a href="#"> Specialized Genetic Tests</a></li>
                    <li><a href="#"> Food Sensitivity Tests</a></li>
                    <li><a href="#">Genova Diagnostics </a></li>
                    <li><a href="#">Hormone Insights Tests</a></li>
                    <li><a href="#">Naturopathic Tests</a></li>
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
            <div class="col-sm-6 col-md-6 col-lg-2">
              <div class="footer-widget-nav">
                <h6 class="footer-widget-title">Links</h6>
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="#">Knowledge base</a></li>
                    <li><a href="#">Report a Vulnerability</a></li>
                    <li><a href="#">Suppliers & Vendors</a></li>
                    <li><a href="#">Genova Diagnostics </a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Contact us</a></li>
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="footer-widget-time">
                <h6 class="footer-widget-title">Working Hours</h6>
                <ul class="time-list list-unstyled">
                  <li>
                    <span class="day">Week Days</span><span class="time">09.00 - 24:00</span>
                  </li>
                  <li>
                    <span class="day">Saturday</span><span class="time">08:00 - 03.00</span>
                  </li>
                  <li>
                    <span class="day">Sunday</span><span class="time">Day off</span>
                  </li>
                </ul>
                <div class="d-flex align-items-center">
                  <a href="contact-us.html" class="btn btn-primary btn-block">
                    <span>Book Your Visit</span> <i class="icon-arrow-right"></i>
                  </a>
                </div>
              </div><!-- /.footer-widget-time -->
            </div><!-- /.col-lg-2 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-primary -->
      <div class="footer-secondary">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 d-flex flex-wrap">
              <ul class="social-icons list-unstyled mb-0 mr-50">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul><!-- /.social-icons -->
              <div>
                <nav>
                  <ul class="list-unstyled footer-copyright-links d-flex flex-wrap mb-0">
                    <li><a href="#">Privacy Statement</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Notice of Nondiscrimination</a></li>
                    <li><a href="#">Report a Vulnerability</a></li>
                  </ul>
                </nav>
                <div class="mt-1">
                  <span>&copy; 2020 DataSoft, All Rights Reserved. With Love by</span>
                  <a class="color-secondary" href="http://themeforest.net/user/7oroof">7oroof.com</a>
                </div>
              </div>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-secondary -->
    </footer><!-- /.Footer -->
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>

    <svg class="svg-pathes" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">

      <clipPath id="hexagon-clippath" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.701 L1,0.701 C1,0.747,0.972,0.789,0.926,0.812 L0.574,0.989 C0.528,1,0.472,1,0.426,0.989 L0.074,0.812 C0.028,0.789,0,0.747,0,0.701 L0,0.701 L0,0.311 L0,0.311 C0,0.265,0.028,0.223,0.074,0.2 L0.426,0.023 C0.472,0,0.528,0,0.574,0.023 L0.926,0.2 C0.972,0.223,1,0.265,1,0.311 L1,0.311 L1,0.701">
        </path>
      </clipPath>
      <clipPath id="hexagon-clippath2" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.701 L1,0.701 C1,0.747,0.972,0.789,0.926,0.812 L0.574,0.989 C0.528,1,0.472,1,0.426,0.989 L0.074,0.812 C0.028,0.789,0,0.747,0,0.701 L0,0.701 L0,0.311 L0,0.311 C0,0.265,0.028,0.223,0.074,0.2 L0.426,0.023 C0.472,0,0.528,0,0.574,0.023 L0.926,0.2 C0.972,0.223,1,0.265,1,0.311 L1,0.311 L1,0.701">
        </path>
      </clipPath>
      <clipPath id="path-direction-right" clipPathUnits="objectBoundingBox">
        <path
          d="M0.006,1 C0.156,1,0.295,0.972,0.371,0.926 L0.95,0.574 C1,0.528,1,0.472,0.95,0.426 L0.371,0.074 C0.295,0.028,0.156,0,0.006,0 L0.006,1">
        </path>
      </clipPath>
      <clipPath id="path-direction-left" clipPathUnits="objectBoundingBox">
        <path
          d="M0.892,1 L0.892,0 L1,0 L1,1 L0.892,1 M0.05,0.574 C-0.017,0.528,-0.017,0.472,0.05,0.426 L0.567,0.074 C0.634,0.028,0.757,0,0.892,0 L0.892,1 C0.757,1,0.634,0.972,0.567,0.926 L0.05,0.574">
        </path>
      </clipPath>
      <clipPath id="path-direction-left2" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0 C0.85,0,0.711,0.028,0.635,0.074 L0.056,0.426 C-0.019,0.472,-0.019,0.528,0.056,0.574 L0.635,0.926 C0.711,0.972,0.85,1,1,1 L1,0">
        </path>
      </clipPath>
      <clipPath id="path-direction-right2" clipPathUnits="objectBoundingBox">
        <path
          d="M0,0 C0.151,0,0.289,0.028,0.365,0.074 L0.944,0.426 C1,0.472,1,0.528,0.944,0.574 L0.365,0.926 C0.289,0.972,0.151,1,0,1 L0,0">
        </path>
      </clipPath>
      <clipPath id="path-direction-up" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.258 C1,0.258,1,0.258,1,0.258 L1,0.258 L1,0.976 C1,0.989,0.993,1,0.983,1 L0.017,1 C0.007,1,0,0.989,0,0.976 L0,0.257 L0,0.257 C0,0.219,0.028,0.183,0.074,0.164 L0.426,0.015 C0.472,-0.005,0.528,-0.005,0.574,0.015 L0.926,0.164 C0.972,0.183,1,0.219,1,0.257 L1,0.257 L1,0.258">
        </path>
      </clipPath>
      <clipPath id="path-direction-down" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.859 C0.998,0.88,0.97,0.898,0.926,0.909 L0.574,0.992 C0.528,1,0.472,1,0.426,0.992 L0.074,0.909 C0.03,0.898,0.002,0.88,0,0.859 L0,0.859 L0,0.857 C0,0.856,0,0.856,0,0.856 L0,0.856 L0,0 L1,0 L1,0.859 L1,0.859">
        </path>
      </clipPath>
      <clipPath id="path-direction-down2" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.743 C1,0.781,0.972,0.817,0.926,0.836 L0.574,0.985 C0.528,1,0.472,1,0.426,0.985 L0.074,0.836 C0.028,0.817,0,0.781,0,0.743 L0,0.743 L0,0.742 C0,0.742,0,0.742,0,0.742 L0,0.742 L0,0.024 C0,0.011,0.007,0,0.017,0 L0.983,0 C0.993,0,1,0.011,1,0.024 L1,0.743 L1,0.743">
        </path>
      </clipPath>
      <clipPath id="path-direction-down-sm" clipPathUnits="objectBoundingBox">
        <path
          d="M1,0.686 C0.997,0.732,0.969,0.773,0.926,0.796 L0.574,0.982 C0.528,1,0.472,1,0.426,0.982 L0.074,0.796 C0.03,0.773,0.003,0.732,0,0.686 L0,0.686 L0,0.681 C0,0.68,0,0.68,0,0.679 L0,0.679 L0,0.042 C0,0.019,0.011,0,0.024,0 L0.976,0 C0.989,0,1,0.019,1,0.042 L1,0.686 L1,0.686">
        </path>
      </clipPath>

      <clipPath id="path-direction-left-large" clipPathUnits="objectBoundingBox">
        <path
          d="M0.301,1 L0.301,0 L1,0 L1,1 L0.301,1 M0.191,0.926 L0.017,0.574 C-0.006,0.528,-0.006,0.472,0.017,0.426 L0.191,0.074 C0.214,0.028,0.256,0,0.301,0 L0.301,1 C0.256,1,0.214,0.972,0.191,0.926">
        </path>
      </clipPath>
      <clipPath id="path-direction-right-large" clipPathUnits="objectBoundingBox">
        <path
          d="M0.983,0.574 L0.809,0.926 C0.786,0.972,0.744,1,0.699,1 L0.699,0 C0.744,0,0.786,0.028,0.809,0.074 L0.983,0.426 C1,0.472,1,0.528,0.983,0.574 M0,0 L0.699,0 L0.699,1 L0,1 L0,0">
        </path>
      </clipPath>
    </svg>

  </div><!-- /.wrapper -->

  <script src="/assets/general/js/jquery-3.5.1.min.js"></script>
  <script src="/assets/general/js/plugins.js"></script>
  <script src="/assets/general/js/main.js"></script>
</body>

</html>