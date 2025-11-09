<?php
require 'sessions.php';
startSession();

$sessionData = getSessionData();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Results</title>
    <link rel="stylesheet" href="exercise-1-N1.css">
</head>
<body>
    <div class="container">
        <h1>Form Results</h1>
        
        <div class="form-section">
            <h2>Form Data</h2>
            <p><span class="label">Name:</span> <?php echo $sessionData['user_name']; ?></p>
            <p><span class="label">Email:</span> <?php echo $sessionData['user_email']; ?></p>
            <p><span class="label">User Type:</span> <?php echo $sessionData['user_type']; ?></p>
            <p><span class="label">Comments:</span> <?php echo $sessionData['user_comment']; ?></p>
        </div>
        
        <div class="session-section">
            <h2>Session Data</h2>
            <p><span class="label">Name:</span> <?php echo $sessionData['user_name']; ?></p>
            <p><span class="label">Email:</span> <?php echo $sessionData['user_email']; ?></p>
            <p><span class="label">User Type:</span> <?php echo $sessionData['user_type']; ?></p>
        </div>
        
        <a href="form.php">Back to Form</a>
    </div>
</body>
</html>