<?php
require 'exceptions.php';  

function validateForm($postData) {
    $errors = [];
    $name = trim($postData['user_name'] ?? '');
    $email = trim($postData['user_email'] ?? '');
    $userType = $postData['user_type'] ?? '';
    $userComment = trim($postData['user_comment'] ?? '');
    
    try {
        if (empty($name)) {
            throw new NameException('Name is required');
        } elseif (strlen($name) < 2) {
            throw new NameException('Name must be at least 2 characters long');
        }

        if (empty($email)) {
            throw new EmailException('Email is required');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new EmailException('Please enter a valid email address');
        }

        if (empty($userType)) {
            throw new UserTypeException('Please select a user type');
        } elseif (!in_array($userType, ['student', 'teacher'])) {
            throw new UserTypeException('Invalid user type selected');
        }
        if (strlen($userComment) > 100) {
            throw new CommentsException('Comments cannot exceed 100 characters');
        }
        
    } catch (NameException $e) {
        $errors['name'] = $e->getMessage();
    } catch (EmailException $e) {
        $errors['email'] = $e->getMessage();
    } catch (UserTypeException $e) { 
        $errors['user_type'] = $e->getMessage();
    } catch (CommentsException $e) {
        $errors['comment'] = $e->getMessage();
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