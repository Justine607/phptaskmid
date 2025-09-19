index

<?php
session_start(); // Start a session

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: profile.php?user=' . $_SESSION['user_id']);
    exit;
}

$error = ''; // For login error messages

// Dummy users data (email => password)
$users = [
    'justine@gmail.com' => '123',
    'sarah@gmail.com' => 'password321',
    'michael@gmail.com' => 'securepass'
];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists and the password matches
    if (isset($users[$email]) && $users[$email] === $password) {
        // Store the user info in the session
        $_SESSION['user_id'] = $email; // Store the email as user_id for this demo
        $_SESSION['email'] = $email;

        // Redirect to the profile page
        header('Location: profile.php?user=' . urlencode($email));
        exit;
    } else {
        $error = 'Invalid email or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mt-5">Login</h2>
                <form method="POST" action="" class="mt-4">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
