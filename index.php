<?php
    if (isset($_GET['error'])) {
        echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    if (isset($_GET['message'])) {
        echo "<p style='color: green;'>" . htmlspecialchars($_GET['message']) . "</p>";
    }
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['npk'])) {
    // Jika sudah login, redirect ke halaman dashboard
    header("Location: pages/dashboard.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TempWatch</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="login.php">
                <h2>Login</h2>
                <span>Use your NPK & password</span>
                <label style="margin-left: 1rem; width: 85%;">NPK<input type="text" placeholder="NPK" name="NPK" required></label>
                <label style="margin-left: 1rem; width: 85%;">Password<input type="password" name="password" placeholder="Password" required></label>
                <button type="submit">Sign In</button>
            </form>
        </div>
        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <div class="card" style="padding: 3rem 2rem; background-color: transparent; border-color: white; border-radius: 48px; border-width: 2px; width: 80%; height: 24rem; position: absolute;">
                        <div class="card-body" style="margin-top: 6rem;">
                            <div class="d-flex justify-content-start">
                                <h2 style="color: white;">Hello, Insan Astra!</h2>     
                            </div>
                            <div class="d-flex justify-content-start" style="margin-bottom: -2rem">
                                <p style="color: white;">Let's start today with focus</p>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="color: white;">and enthusiasm!</p>
                            </div>
                        </div>
                    </div>
                    <img style="width: 60%; position: absolute; top: 13.1rem; left: 22.3rem" src="src/image/Welcome.png">
                    <img style="width: 5rem; position: absolute; top: 22rem; left: 2rem; border-radius: 50%" src="src/image/Logo daihatsu.png">
                </div>
            </div>
        </div>
    </div>
    <span class="material-symbols--help"></span>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="login.js"></script>
</body>

</html>
