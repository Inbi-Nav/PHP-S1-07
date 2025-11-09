<?php
function validateForm($postData) {
    $errors = [];

    $name = trim($postData['user_name'] ?? '');
    $email = trim($postData['user_email'] ?? '');
    $userType = $postData['user_type'] ?? '';
    $userComment = trim($postData['user_comment'] ?? '');

    if (empty($name)) {
        $errors['name'] = 'Name is required';
    } elseif (strlen($name) < 2) {
        $errors['name'] = 'Name must be at least 2 characters long';
    }
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    if (empty($userType)) {
        $errors['user_type'] = 'Please select a user type';
    } elseif (!in_array($userType, ['student', 'teacher'])) {
        $errors['user_type'] = 'Invalid user type selected';
    }
    if (strlen($userComment) > 100) {
        $errors['comment'] = 'Comments cannot exceed 100 characters';
    }

    return [
        'errors' => $errors,
        'validated_data' => [
            'name' => $name,
            'email' => $email,
            'user_type' => $userType,
            'user_comment' => $userComment
        ]
    ];
}
?>