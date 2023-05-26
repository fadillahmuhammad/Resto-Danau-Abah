<?php
session_start();
session_regenerate_id(true);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login1.css">
    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar">
        <a href="#"><img src="images/assets-web/logo_danauabah.png" class="navbar-logo" alt="logo"></a>
    </nav>
    <!-- navbar end -->

    <!-- login form start -->
    <div class="login-form">
        <form action="auth/login_success.php" method="post">
            <div class="login-container">
                <h2>Login</h2>
                <?php if (isset($_SESSION['login_error'])) : ?>
                    <div id="notification"></div>
                    <script>
                        document.getElementById("notification").innerHTML = "<?php echo $_SESSION['login_error']; ?>";
                        document.getElementById("notification").classList.add("show");
                        setTimeout(function() {
                            document.getElementById("notification").classList.remove("show");
                        }, 3000);
                    </script>
                    <?php unset($_SESSION['login_error']); ?>
                <?php endif; ?>
                <div class="input-gap">
                    <div class="input-login">
                        <label for="username">Username</label>
                        <div class="input-area">
                            <span><i data-feather="user"></i></span>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-login">
                        <label for="password">Password</label>
                        <div class="input-area">
                            <span><i data-feather="lock"></i></span>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <button class="submit" type="submit">Login</button>
            </div>
        </form>
    </div>
    <!-- login form end -->

    <!-- fetaher icons -->
    <script>
        feather.replace()
    </script>
</body>

</html>