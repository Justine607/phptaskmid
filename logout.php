logout


<?php
session_start(); // Start session to access session data

// Destroy all session data
session_destroy();

// Redirect to login page
header('Location: index.php');
exit;
?>
