<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
        <h1>User Registration</h1>
        <?php
        require 'validation.php';
        
        $errors = [];
        $name = $email = $userType = $userComment = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = validateForm($_POST);
            $errors = $resultado['errors'];
            $datos = $resultado['validated_data'];
            
            $name = $datos['name'];
            $email = $datos['email'];
            $userType = $datos['user_type'];
            $userComment = $datos['user_comment'];
            
            if (empty($errors)) {
                require 'sessions.php';
                startSession();
                saveToSession($name, $email, $userType, $userComment);
                header('Location: exercise-1-N1.php');
                exit;
            }
        }
        ?>
        
        <?php if (!empty($errors)): ?>
            <div class="error-message">
                <h3>Error</h3>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form">
                <label>Name:</label>
                <input type="text" name="user_name" value="<?php echo $name; ?>" required>
            </div>
            
            <div class="form">
                <label>Email:</label>
                <input type="text" name="user_email" value="<?php echo $email; ?>" required>
            </div>
            
            <div class="form">
                <label>User Type:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="user_type" value="student" 
                               <?php if ($userType === 'student') echo 'checked'; ?> required> 
                        Student
                    </label>
                    <label>
                        <input type="radio" name="user_type" value="teacher" 
                               <?php if ($userType === 'teacher') echo 'checked'; ?>> 
                        Teacher
                    </label>
                </div>
            </div>
            
            <div class="form">
                <label>Comments:</label>
                <textarea name="user_comment" rows="4"><?php echo $userComment; ?></textarea>
            </div>
            
            <input type="submit" value="Submit Form" class="submit-btn">
        </form>
    </div>
</body>
</html>