<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");

    exit;
}

$fullName = $_SESSION["full_name"];
$studentId = $_SESSION["student_id"];
$email = $_SESSION["email"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal Dashboard</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<div class="dashboard">

    <!-- ========================= -->
    <!-- Sidebar -->
    <!-- ========================= -->

    <aside class="sidebar">

        <div class="logo">

            <h2>Student Portal</h2>

        </div>

        <nav>

            <a onclick="showPage('home')" class="active-link">

                <i class="fa-solid fa-house"></i>

                Dashboard

            </a>

            <a onclick="showPage('profile')">

                <i class="fa-solid fa-user"></i>

                Profile

            </a>

            <a onclick="showPage('announcements')">

                <i class="fa-solid fa-bullhorn"></i>

                Announcements

            </a>

            <a onclick="showPage('courses')">

                <i class="fa-solid fa-book-open"></i>

                Courses

            </a>

            <a onclick="showPage('timetable')">

                <i class="fa-solid fa-calendar-days"></i>

                Timetable

            </a>

            <a onclick="showPage('assignments')">

                <i class="fa-solid fa-file-lines"></i>

                Assignments

            </a>

            <a onclick="showPage('exams')">

                <i class="fa-solid fa-chart-column"></i>

                Exams

            </a>

            <a onclick="showPage('gpa')">

                <i class="fa-solid fa-graduation-cap"></i>

                GPA Calculator

            </a>

        </nav>

        <a href="logout.php" class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </aside>

    <!-- ========================= -->
    <!-- Main Content -->
    <!-- ========================= -->

    <main class="content">

        <div id="home" class="page active">

            <!-- Header -->

            <div class="header">

                <div class="welcome">

                    <h1>Dashboard</h1>

                    <p>
                        Welcome back <?php echo htmlspecialchars($fullName); ?>
                    </p>

                </div>

                <div class="header-tools">

                    <div class="search-box">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="text"
                            placeholder="Search..."
                        >

                    </div>

                    <div class="notification">

                        <i class="fa-solid fa-bell"></i>

                        <span>0</span>

                    </div>


                <div class="profile-mini">

                    <div class="profile-icon">
                         <i class="fa-solid fa-user-graduate"></i>
                 </div>

                  <div>

              <h4><?php echo htmlspecialchars($fullName); ?></h4>

             <small>Student</small>

                 </div>

                </div>

                </div>

            </div>

            <!-- Hero -->

            <section class="hero">

                <img
                    id="slide"
                    src="images/slide1.jpg"
                    alt="Campus"
                >

                <div class="hero-overlay">

                    <h2>Excellence in Education</h2>

                    <h3>Success in Life</h3>

                    <p>

                        Empowering students through innovation,
                        collaboration, and academic excellence.

                    </p>

                    <button class="hero-btn">

                        Explore Campus

                    </button>

                </div>

            </section>

            <!-- Dashboard Cards -->

            <section class="dashboard-grid">

                <div class="dashboard-card">

                    <div class="icon purple">

                        <i class="fa-solid fa-user"></i>

                    </div>

                    <div>

                        <h3>Student Profile</h3>

                        <p>

                            View your personal information.

                        </p>

                    </div>

                </div>

                <div class="dashboard-card">

                    <div class="icon pink">

                        <i class="fa-solid fa-bullhorn"></i>

                    </div>

                    <div>

                        <h3>Announcements</h3>

                        <p>

                            Latest university updates.

                        </p>

                    </div>

                </div>

                <div class="dashboard-card">

                    <div class="icon green">

                        <i class="fa-solid fa-book-open"></i>

                    </div>

                    <div>

                        <h3>Courses</h3>

                        <p>

                            Manage your registered courses.

                        </p>

                    </div>

                </div>

                <div class="dashboard-card">

                    <div class="icon blue">

                        <i class="fa-solid fa-graduation-cap"></i>

                    </div>

                    <div>

                        <h3>GPA Calculator</h3>

                        <p>

                            Calculate your semester GPA.

                        </p>

                    </div>

                </div>

            </section>

        </div>

        <!-- ========================= -->
        <!-- PROFILE PAGE -->
        <div id="profile" class="page">

    <h2>Student Profile</h2>

    <div class="card">
        

            <p>
            <strong>Name:</strong>
            <?php echo htmlspecialchars($fullName); ?>
        </p>

        <br>

        <p>
            <strong>ID:</strong>
            <?php echo htmlspecialchars($studentId); ?>
        </p>

        <br>

        <p>
            <strong>Department:</strong>
            Computer Science
        </p>

        <br>

        <p>
            <strong>Email:</strong>
            <?php echo htmlspecialchars($email); ?>
        </p>

    </div>

</div>

<!-- ========================= -->
<!-- ANNOUNCEMENTS -->
<!-- ========================= -->

<div id="announcements" class="page">

    <h2>Latest Announcements</h2>

    <div class="card">

        <h3> Midterm Exams</h3>

        <p>
            Midterm examinations will begin next week.
            Please check your timetable for the exact dates.
        </p>

    </div>

    <div class="card">

        <h3>Registration</h3>

        <p>
            Course registration closes on 30 August.
            Make sure you complete your registration.
        </p>

    </div>

    <div class="card">

        <h3>AI Workshop</h3>

        <p>
            Join the Artificial Intelligence workshop
            next Sunday at the main auditorium.
        </p>

    </div>

</div>

<!-- ========================= -->
<!-- COURSES -->
<!-- ========================= -->

<div id="courses" class="page">

    <h2>Available Courses</h2>

    <div class="dashboard-grid">

        <div class="card">

            <h3>Web Programming</h3>

            <br>

            <button onclick="registerCourse(this)">

                Register

            </button>

        </div>

        <div class="card">

            <h3>Database Systems</h3>

            <br>

            <button onclick="registerCourse(this)">

                Register

            </button>

        </div>

        <div class="card">

            <h3>Artificial Intelligence</h3>

            <br>

            <button onclick="registerCourse(this)">

                Register

            </button>

        </div>

        <div class="card">

            <h3>Data Mining</h3>

            <br>

            <button onclick="registerCourse(this)">

                Register

            </button>

        </div>

        <div class="card">

            <h3>Machine Learning</h3>

            <br>

            <button onclick="registerCourse(this)">

                Register

            </button>

        </div>

    </div>

</div>

<!-- ========================= -->
<!-- TIMETABLE -->
<!-- ========================= -->

<div id="timetable" class="page">

    <h2>Weekly Timetable</h2>

    <table>

        <tr>

            <th>Day</th>

            <th>Course</th>

            <th>Time</th>

            <th>Room</th>

        </tr>

        <tr>

            <td>Sunday</td>

            <td>Web Development</td>

            <td>10:00 AM</td>

            <td>A201</td>

        </tr>

        <tr>

            <td>Monday</td>

            <td>Artificial Intelligence</td>

            <td>12:00 PM</td>

            <td>B105</td>

        </tr>

        <tr>

            <td>Tuesday</td>

            <td>Data Mining</td>

            <td>11:00 AM</td>

            <td>C210</td>

        </tr>

        <tr>

            <td>Wednesday</td>

            <td>Database Systems</td>

            <td>10:00 AM</td>

            <td>D302</td>

        </tr>

        <tr>

            <td>Thursday</td>

            <td>Machine Learning</td>

            <td>1:00 PM</td>

            <td>E110</td>

        </tr>

    </table>

</div>

<!-- ========================= -->
<!-- ASSIGNMENTS -->
 <div id="assignments" class="page">

    <h2>Assignments</h2>

    <div class="card">

        <h3>Artificial Intelligence</h3>

        <p>Assignment 2 - Due: 10 Aug 2026</p>

    </div>

    <div class="card">

        <h3>Database Systems</h3>

        <p>Database Project - Due: 20 Aug  2026</p>

    </div>

    <div class="card">

        <h3>Data Mining</h3>

        <p>Classification Report - Due: 15 Aug 2026</p>

    </div>

    <div class="card">

        <h3>Machine Learning</h3>

        <p>Neural Network Project - Due: 24 Aug 2026</p>

    </div>

</div>

<!-- ========================= -->
<!-- EXAMS -->
<!-- ========================= -->

<div id="exams" class="page">

    <h2>Exam Schedule</h2>

    <table>

        <tr>

            <th>Course</th>

            <th>Date</th>

            <th>Time</th>

            <th>Room</th>

        </tr>

        <tr>

            <td>Web Development</td>

            <td>1 August</td>

            <td>10:00 AM</td>

            <td>Hall A</td>

        </tr>

        <tr>

            <td>Artificial Intelligence</td>

            <td>3 August</td>

            <td>12:00 PM</td>

            <td>Hall B</td>

        </tr>

        <tr>

            <td>Data Mining</td>

            <td>5 August</td>

            <td>11:00 AM</td>

            <td>Hall C</td>

        </tr>

        <tr>

            <td>Machine Learning</td>

            <td>7 August</td>

            <td>1:00 PM</td>

            <td>Hall D</td>

        </tr>

        <tr>

            <td>Database Systems</td>

            <td>9 August</td>

            <td>10:00 AM</td>

            <td>Hall E</td>

        </tr>

    </table>

</div>

<!-- ========================= -->
<!-- GPA -->
<!-- ========================= -->

<div id="gpa" class="page">

    <h2>GPA Calculator</h2>

    <div class="card">

        <p>
            Enter your GPA below.
        </p>

        <br>

        <input
            type="number"
            id="grade"
            placeholder="Enter GPA (0 - 4)"
            min="0"
            max="4"
            step="0.1"
        >

        <button onclick="calcGPA()">

            Calculate

        </button>

        <h3
            id="result"
            style="margin-top:30px;"
        ></h3>

    </div>

</div>

</main>

</div>

<script src="script.js"></script>

</body>

</html>