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
    <link href="style.css" rel="stylesheet">

</head>

<body class="contact-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="admin.php" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">EDUCATE</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="admin.php" class="active">Admin</a></li>
                    <li><a href="../Login/logout.php" class="logout">Logout</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Admin Page</h1>
                            <p class="mb-0">Welcome to the Admin Dashboard! Here, you can manage all aspects of the system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <!-- Manage Users Section -->
        <section id="manage-users">
            <div class="container">
                <h2>Manage Users</h2>
                <!-- Add User Form -->
                <form action="add_user.php" method="POST">
                    <h4>Add User</h4>
                    <input type="text" name="username" placeholder="Enter Username" required>
                    <input type="email" name="email" placeholder="Enter Email" required>
                    <input type="password" name="password" placeholder="Enter Password" required>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>

                <!-- View Users Table -->
                <h4>View Users</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>
                                <a href="edit_user.php?id=1" class="btn btn-warning">Edit</a>
                                <a href="delete_user.php?id=1" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>
                                <a href="edit_user.php?id=2" class="btn btn-warning">Edit</a>
                                <a href="delete_user.php?id=2" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael Brown</td>
                            <td>michael@example.com</td>
                            <td>
                                <a href="edit_user.php?id=3" class="btn btn-warning">Edit</a>
                                <a href="delete_user.php?id=3" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Manage Courses Section -->
        <section id="manage-courses">
            <div class="container">
                <h2>Manage Courses</h2>
                <!-- Add Course Form -->
                <form action="add_course.php" method="POST">
                    <h4>Add Course</h4>
                    <input type="text" name="course_name" placeholder="Enter Course Name" required>
                    <input type="text" name="course_description" placeholder="Enter Course Description" required>
                    <button type="submit" class="btn btn-primary">Add Course</button>
                </form>

                <!-- Edit Course Form -->
                <form action="edit_course.php" method="POST">
                    <h4>Edit Course</h4>
                    <input type="number" name="course_id" placeholder="Enter Course ID" required>
                    <input type="text" name="new_course_name" placeholder="Enter New Course Name" required>
                    <input type="text" name="new_course_description" placeholder="Enter New Course Description" required>
                    <button type="submit" class="btn btn-warning">Edit Course</button>
                </form>

                <!-- Remove Course Form -->
                <form action="remove_course.php" method="POST">
                    <h4>Remove Course</h4>
                    <input type="number" name="course_id" placeholder="Enter Course ID to remove" required>
                    <button type="submit" class="btn btn-danger">Remove Course</button>
                </form>

                <!-- View Courses Table -->
                <h4>View Courses</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>Web Development</td>
                            <td>Learn the basics of web development with HTML, CSS, and JavaScript.</td>
                            <td>
                                <a href="edit_course.php?id=101" class="btn btn-warning">Edit</a>
                                <a href="remove_course.php?id=101" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                        <tr>
                            <td>102</td>
                            <td>Database Management</td>
                            <td>Learn how to design and manage databases using SQL.</td>
                            <td>
                                <a href="edit_course.php?id=102" class="btn btn-warning">Edit</a>
                                <a href="remove_course.php?id=102" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                        <tr>
                            <td>103</td>
                            <td>Software Engineering</td>
                            <td>Learn software development techniques and methodologies.</td>
                            <td>
                                <a href="edit_course.php?id=103" class="btn btn-warning">Edit</a>
                                <a href="remove_course.php?id=103" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

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
    <script src="../Project/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Project/assets/vendor/php-email-form/validate.js"></script>
    <script src="../Project/assets/vendor/aos/aos.js"></script>
    <script src="../Project/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../Project/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../Project/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>

    <!-- Main JS File -->
    <script src="../Project/assets/js/main.js"></script>

</body>

</html>
