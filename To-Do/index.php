<?php
// Include the database connection
include('../connection.php');

// Start the session to get the logged-in user
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

// Fetch tasks for the logged-in user from the database
$query = "SELECT * FROM todo_list WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']); // Bind the logged-in user's ID
$stmt->execute();
$result = $stmt->get_result();
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../Project/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Project/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../Project/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../Project/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../Project/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../Project/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body class="contact-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="../index.php" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">EDUCATE</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="../index.php">Home<br></a></li>
                    <li><a href="../Project/about.html">About</a></li>
                    <li><a href="../Project/courses.html">Courses</a></li>
                    <li><a href="../Project/quiz/quiz.php">Quiz</a></li>
                    <li><a href="index.php">To-Do</a></li>
                    <li><a href="../Project/contact.html" class="active">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="courses.html">Get Started</a>

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>To-Do</h1>
                            <p class="mb-0">We’d love to hear from you! Whether you have a question, suggestion, or feedback, feel free to reach out. Our team is ready to assist you.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="../index.php">Home</a></li>
                        <li class="current">To-Do</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

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
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/Project/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Project/assets/vendor/php-email-form/validate.js"></script>
    <script src="/Project/assets/vendor/aos/aos.js"></script>
    <script src="/Project/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/Project/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/Project/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/Project/assets/js/main.js"></script>
    <script src="script.js"></script>       
</body>

</html>