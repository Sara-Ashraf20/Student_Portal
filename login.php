<?php

session_start();

require_once "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if (empty($email) || empty($password)) {

        $error = "Please enter your email and password.";

    } else {

        $stmt = $conn->prepare(
            "SELECT id, full_name, student_id, email, password
             FROM users
             WHERE email = ?"
        );

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {

                session_regenerate_id(true);

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["full_name"] = $user["full_name"];
                $_SESSION["student_id"] = $user["student_id"];
                $_SESSION["email"] = $user["email"];

                header("Location: dashboard.php");
                exit;

            } else {

                $error = "Invalid email or password.";

            }

        } else {

            $error = "Invalid email or password.";

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Portal Login</title>

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
                 alt="Student Login">

        </div>

        <div class="content">

            <h1>Welcome Back!</h1>

            <p>Login to access your student portal</p>

            <?php if (isset($_GET["registered"])): ?>

                <p class="success">
                    Account created successfully! Please login.
                </p>

            <?php endif; ?>

            <?php if (!empty($error)): ?>

                <p class="error">
                    <?php echo htmlspecialchars($error); ?>
                </p>

            <?php endif; ?>

            <form method="POST"
                  action="login.php">

                <label>Email Address</label>

                <div class="input-box">

                    <i class="fa-regular fa-envelope"></i>

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
                        placeholder="Enter your password"
                        required
                    >

                    <i class="fas fa-eye toggle-password"></i>

                </div>

                <a href="#"
                   class="forgot">
                    Forgot password?
                </a>

                <button type="submit">
                    Login
                </button>

                <div class="signup">

                    <p>

                        Don't have an account?

                        <a href="register.php">
                            Create a new account
                        </a>

                    </p>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="script.js"></script>

</body>

</html>