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
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Project/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Project/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Project/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="Project/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Project/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="Project/assets/css/main.css" rel="stylesheet">
  <link rel="chatbot/style.css" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
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
          <li><a href="Project/contact.html">Contact</a></li>

          <!-- Conditionally display login/logout and username based on session -->
          <?php if (isset($_SESSION['email'])): ?>
            <!-- If user is logged in, show username and logout -->
            <li><a href="index.php" class="active"><?php echo $_SESSION['name']; ?></a></li>
            <li><a href="Login/logout.php" class="logout">Logout</a></li>
          <?php else: ?>
            <!-- If user is not logged in, show "User" and login -->
            <li><a href="index.php" class="active">User</a></li>
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
        <p data-aos="fade-up" data-aos-delay="200">We are a team of talented designers making websites with Bootstrap
        </p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="Project/courses.html" class="btn-get-started">Get Started</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="course-item">
              <img src="Project/assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <h3><a href="Project/course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                  dolores dolorem tempore.</p>
              </div>
            </div>

          </div> <!-- End Course Item-->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="course-item">
              <img src="Project/assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <h3><a href="Project/course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                  dolores dolorem tempore.</p>
              </div>
            </div>

          </div> <!-- End Course Item-->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="course-item">
              <img src="Project/assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <h3><a href="Project/course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                  dolores dolorem tempore.</p>
              </div>
            </div>

          </div> <!-- End Course Item-->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="course-item">
              <img src="Project/assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <h3><a href="Project/course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                  dolores dolorem tempore.</p>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="course-item">
              <img src="Project/assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <h3><a href="Project/course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                  dolores dolorem tempore.</p>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
            data-aos-delay="300">
            <div class="course-item">
              <img src="Project/assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <h3><a href="Project/course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                  dolores dolorem tempore.</p>
              </div>
            </div>
          </div>

          <?php
          // Fetch courses from the database
          $sql = "SELECT title, description, img, link FROM courses";
          $result = $conn->query($sql);

          // Check if there are any courses in the database
          if ($result->num_rows > 0) {
            // Output data of each course
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
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
            echo "No courses available.";
          }

          $conn->close();
          ?>
          <!-- End Course Item-->

          <!-- Add more courses here if needed -->

        </div>

      </div>

    </section>
    <!-- /Courses Section -->

    <button class="flex fixed bottom-10 right-5 z-20 shadow-md" id="chat-bot-icon"><img src="chatbot/chat-bot.png" class="w-[60px]" alt="Chat Bot"></button>
        <div id="chat-bot" class=" fixed bottom-20 right-2 z-10 w-[350px] h-[500px] rounded-lg">
            <div class="chat-bot-container relative hidden w-full p-2 h-full bg-gray-800 text-white flex flex-col rounded-lg">
                <div class="text-center relative chat-header text-green-400 text-2xl font-bold border-b-2 border-green-500 p-2">
                    <h2 class="my-2">Chat Bot</h2>
                </div>
                <div class="chat-body relative p-4 my-4 overflow-y-auto flex-1">
                    <div id="mydiv">
                        <p>Hello! How can I assist you today?</p>
                    </div>
                </div>
                <div class="chat-footer relative border-green-400 bg-gray-700 w-[95%] p-2 mx-auto flex items-center justify-between">
                    <input type="text"  placeholder="Type your message..." class=" p-2 w-full md:w-[80%] rounded-lg bg-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button id="send_button"><img src="chatbot/send.png" alt="send"  class="w-[35px] z-20"/></button>
                </div>
            </div>
        </div>

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PHP-PROJECT</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by Group 09
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="Project/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Project/assets/vendor/aos/aos.js"></script>
  <script src="Project/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Project/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="Project/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="chatbot/style.css"></script>        

  <!-- Main JS File -->
  <script src="Project/assets/js/main.js"></script>

</body>

</html>
