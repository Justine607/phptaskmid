profile

<?php
session_start(); // Start the session

// Check if the user is logged in (via SESSION)
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_GET['user'] ?? ''; // Get user ID from URL
// Check if the user_id in the GET request matches the logged-in user
if ($user_id != $_SESSION['user_id']) {
    echo "Access Denied";
    exit;
}

// Dummy data for the profile (you can replace this with a database query)
$user_name = 'Justine kylle Pilapil';
$user_email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Welcome to Your Profile</h2>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">User Details</h5>
                        <p class="card-text"><strong>Name:</strong> <?= $user_name ?></p>
                        <p class="card-text"><strong>Email:</strong> <?= $user_email ?></p>
                    </div>
                </div>
                <a href="logout.php" class="btn btn-danger mt-3 w-100">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
