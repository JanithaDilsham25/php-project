<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PHP-GROUP 09</title>

  <!-- Favicons -->
  <link href="Project/assets/img/favicon.png" rel="icon">
  <link href="Project/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins&family=Raleway&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Project/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Project/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Project/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="Project/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Project/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="Project/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">EDUCATE</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="Project/about.html">About</a></li>
          <li><a href="Project/courses.html">Courses</a></li>
          <li><a href="Project/quiz/quiz.php">Quiz</a></li>
          <li><a href="/To-Do/index.php">To-Do</a></li>
          <li><a href="Admin/admin.php">Chat</a></li>
          <li><a href="Project/contact.html">Contact</a></li>

          <?php if (isset($_SESSION['email'])): ?>
            <li><a href="index.php"><?php echo $_SESSION['name']; ?></a></li>
            <li><a href="Login/logout.php" class="logout">Logout</a></li>
          <?php else: ?>
            <li><a href="index.php">User</a></li>
            <li><a href="Login/login.php">Login</a></li>
          <?php endif; ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="Project/courses.html">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="Project/assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
        <p data-aos="fade-up" data-aos-delay="200">We are a team of talented designers making websites with Bootstrap</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="Project/courses.html" class="btn-get-started">Get Started</a>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div>

      <div class="container">
        <div class="row">
          <?php
          $sql = "SELECT title, description, img, link FROM courses";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="course-item">
                  <img src="<?php echo $row['img']; ?>" class="img-fluid" alt="...">
                  <div class="course-content">
                    <h3><a href="<?php echo $row['link']; ?>"><?php echo $row['title']; ?></a></h3>
                    <p class="description"><?php echo $row['description']; ?></p>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<p>No courses available.</p>";
          }

          $conn->close();
          ?>
        </div>
      </div>
    </section>
    <!-- /Courses Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container text-center mt-4">
      <p>© <strong class="sitename">PHP-PROJECT</strong> All Rights Reserved</p>
      <div class="credits">Designed by Group 09</div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="Project/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Project/assets/vendor/aos/aos.js"></script>
  <script src="Project/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Project/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="Project/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="Project/assets/js/main.js"></script>

</body>

</html>
