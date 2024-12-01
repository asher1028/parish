<?php
include 'userSessionStart.php'; // Start the session
include '../config/connection.php'; // Include your database connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$input = '';
$error = '';

// Function to verify login credentials
function verifyLogin($conn, $input, $password) {
    $stmt = $conn->prepare("SELECT username, password, is_restricted FROM user WHERE username = ? OR email = ? OR contact_num = ?");
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        return false;
    }
    $stmt->bind_param("sss", $input, $input, $input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $hashedPassword = $row['password'];
        $isRestricted = $row['is_restricted'];

        if ($isRestricted == 1) {
            return 'Account is restricted. Please contact support.';
        }

        if (password_verify($password, $hashedPassword)) {
            return $username;
        }
    }
    return false;
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['username'];
    $password = $_POST['password'];

    $username = verifyLogin($conn, $input, $password);
    if ($username === false) {
        $error = 'Incorrect Username, Email, or Contact Number, or Password!';
    } elseif ($username === 'Account is restricted. Please contact support.') {
        $error = $username;
    } else {
        $_SESSION['username'] = $username;
        header("Location: userLandingpage.php");
        exit();
    }
}

// Redirect logged-in users
if (isset($_SESSION['username'])) {
    header("Location: userLandingpage.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parish of San Juan</title>
    <link rel="stylesheet" href="userHomepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script defer src="login.js"></script>
    <style>
        .loginLinks {
            font-weight: lighter;
            font-style: italic;
            color: rgb(10, 10, 100);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'userHeader.php'; ?>

    <div class="containerdiv">
        <div class="d-flex p-3">
            <div id="loginFormOut">
                <div id="loginDiv">
                    <form id="loginForm" method="POST" action="">
                        <br>
                        <img src="../Images/logoSJBP.png" id="logoSJBP" alt="Logo">
                        <br>
                        <p id="loginFormLabel">PLEASE LOGIN</p>
                        <input type="text" name="username" placeholder="Username, Email, or Contact Number" id="txtUser" required value="<?php echo htmlspecialchars($input); ?>">
                        <br>
                        <input type="password" name="password" placeholder="Password" id="txtPass" required>
                        <br>
                        <input type="submit" value="Log in" id="btnLogin">
                        <br>
                        <a href="userForgotPass.php" id="forgotPassLink" class="loginLinks">Forgot Password?</a>
                        <br>
                        <a href="createUserAccount.php" id="createAccount" class="loginLinks">Sign Up</a>
                    </form>
                    <?php if ($error): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div id="newUserNote">
                <p id="text1">Are you new here?</p>
                <br>
                <p id="text2">"Sign up here and let us provide</p>
                <br>
                <p id="text2dot1">you with our excellent service!"</p>
                <br>
                <button id="btnSignUp" class="btn btn-primary">Sign Up</button>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['username'])): ?>
        <div class="logout">
            Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?>
            <br>
            <a href="userLogout.php">Logout</a>
        </div>
    <?php endif; ?>
</body>
</html>

