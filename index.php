<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PHP-GROUP 09</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="Project/meassets/img/favicon.png" rel="icon">
  <link href="Project/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
          </div> <!-- End Course Item-->

          <!-- Add more courses here if needed -->

        </div>

      </div>

    </section><!-- /Courses Section -->

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
  <script src="Project/assets/vendor/php-email-form/validate.js"></script>
  <script src="Project/assets/vendor/aos/aos.js"></script>
  <script src="Project/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Project/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="Project/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="Project/assets/js/main.js"></script>

</body>

</html>



////////////////////

todo.php


<?php
// Include the database connection
include('../connection.php');

// Add a new task
if (isset($_POST['todoi'])) {
    // Sanitize input
    $task = $conn->real_escape_string(trim($_POST['task']));
    
    if (!empty($task)) {
        // Insert the task into the database
        $stmt = $conn->prepare("INSERT INTO todo_list (task, mark) VALUES (?, ?)");
        $mark = 'Uncome'; // Default mark
        $stmt->bind_param("ss", $task, $mark);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect back to the index page after adding
    header("Location: index.php");
    exit;
}

// Delete a task
if (isset($_POST['delete_task'])) {
    // Get the task ID
    $task_id = $_POST['task_id'];

    // Delete the task from the database
    $stmt = $conn->prepare("DELETE FROM todo_list WHERE todo_id = ?");
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the index page after deleting
    header("Location: index.php");
    exit;
}
?>



///// todo index



<?php
// Include the database connection
include('../connection.php');

// Fetch tasks from the database
$query = "SELECT * FROM todo_list ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="todo-container">
        <h1>To-Do List</h1>

        <!-- Form to add a new task -->
        <form method="POST" action="todo.php" class="todo-form">
            <input type="text" name="task" placeholder="Add a new task" class="todo-input" required>
            <button type="submit" name="todoi" class="todo-btn">Add Task</button>
        </form>

        <h2>Task List</h2>
        <ul class="todo-list">
            <?php
            // Display tasks from the database
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="todo-item">';
                    echo '<span>' . htmlspecialchars($row['task']) . ' (' . $row['mark'] . ')</span>';

                    // Remove the Edit option form
                    // Only show the Delete form now
                    echo '<form method="POST" action="todo.php" style="display:inline;">
                            <input type="hidden" name="task_id" value="' . $row['todo_id'] . '">
                            <button type="submit" name="delete_task" class="remove-btn">Delete</button>
                        </form>';
                    echo '</li>';
                }
            } else {
                echo '<li>No tasks available</li>';
            }
            ?>
        </ul>
    </div>

    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
