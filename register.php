<?php

require_once "db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $studentId = trim($_POST["student_id"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirm_password"] ?? "";

    // Name validation
    if (strlen($name) < 3) {

        $error = "Name must contain at least 3 characters.";

    }

    // Student ID validation
    elseif (empty($studentId)) {

        $error = "Student ID is required.";

    }

    // Email validation
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Please enter a valid email.";

    }

    // Password validation
    elseif (strlen($password) < 6) {

        $error = "Password must be at least 6 characters.";

    }

    // Confirm password
    elseif ($password !== $confirmPassword) {

        $error = "Passwords do not match.";

    }

    else {

        // Check whether email or student ID already exists
        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ? OR student_id = ?"
        );

        $check->bind_param("ss", $email, $studentId);

        $check->execute();

        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $error = "Email or Student ID already exists.";

        } else {

            // Hash password
            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Insert user
            $stmt = $conn->prepare(
                "INSERT INTO users 
                (full_name, student_id, email, password)
                VALUES (?, ?, ?, ?)"
            );

            $stmt->bind_param(
                "ssss",
                $name,
                $studentId,
                $email,
                $hashedPassword
            );

            if ($stmt->execute()) {

                header("Location: login.php?registered=1");
                exit;

            } else {

                $error = "Something went wrong. Please try again.";

            }

            $stmt->close();
        }

        $check->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Create Account | Student Portal</title>

    <link rel="stylesheet" href="auth.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <div class="top">

            <div class="logo">

                <i class="fas fa-graduation-cap"></i>

                <div class="logo-text">

                    <h3>Student Portal</h3>

                    <p>Your gateway to success</p>

                </div>

            </div>

            <img src="login_Image.png"
                 alt="Student Register">

        </div>

        <div class="content">

            <h1>Create Account</h1>

            <p>Join our student portal and get started</p>

            <?php if (!empty($error)): ?>

                <p class="error">
                    <?php echo htmlspecialchars($error); ?>
                </p>

            <?php endif; ?>

            <form method="POST"
                  action="register.php">

                <label>Full Name</label>

                <div class="input-box">

                    <i class="fas fa-user"></i>

                    <input
                        type="text"
                        name="name"
                        placeholder="Enter your full name"
                        required
                        value="<?php echo htmlspecialchars($_POST["name"] ?? ""); ?>"
                    >

                </div>

                <label>Student ID</label>

                <div class="input-box">

                    <i class="fas fa-id-card"></i>

                    <input
                        type="text"
                        name="student_id"
                        placeholder="Enter your Student ID"
                        required
                        value="<?php echo htmlspecialchars($_POST["student_id"] ?? ""); ?>"
                    >

                </div>

                <label>Email Address</label>

                <div class="input-box">

                    <i class="far fa-envelope"></i>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                        value="<?php echo htmlspecialchars($_POST["email"] ?? ""); ?>"
                    >

                </div>

                <label>Password</label>

                <div class="input-box">

                    <i class="fas fa-lock"></i>

                    <input
                        type="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    >

                    <i class="fas fa-eye toggle-password"></i>

                </div>

                <label>Confirm Password</label>

                <div class="input-box">

                    <i class="fas fa-lock"></i>

                    <input
                        type="password"
                        name="confirm_password"
                        placeholder="Confirm your password"
                        required
                    >

                    <i class="fas fa-eye toggle-password"></i>

                </div>

                <button type="submit">
                    Create Account
                </button>

                <p class="bottom">

                    Already have an account?

                    <a href="login.php">
                        Login
                    </a>

                </p>

            </form>

        </div>

    </div>

</div>

<script src="script.js"></script>

</body>

</html>