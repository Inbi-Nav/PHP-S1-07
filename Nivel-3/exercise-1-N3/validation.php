<?php
require 'exceptions.php';  

function validateForm($postData) {
    $errors = [];
    $name = trim($postData['user_name'] ?? '');
    $email = trim($postData['user_email'] ?? '');
    $userType = $postData['user_type'] ?? '';
    $userComment = trim($postData['user_comment'] ?? '');
    $userPhone = trim($postData['user_phone'] ?? '');   
    $userAge = trim($postData['user_age'] ?? '');        

    
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

        if (!empty($userPhone)) {
            $phonePattern = "/^(\d{3}-\d{3}-\d{4}|\d{10})$/";
            if (!preg_match($phonePattern, $userPhone)) {
                throw new PhoneException('Phone must be in format: 123-456-7890 or 1234567890');
            }
        }

        if (!empty($userAge)) {
            if (!filter_var($userAge, FILTER_VALIDATE_INT)) {
                throw new AgeException('Age must be a valid number');
            }
            
            $age = (int)$userAge;
            if ($age < 15 || $age > 40) {
                throw new AgeException('Age must be between 15 and 40');
            }
        }
        
    } catch (NameException $e) {
        $errors['name'] = $e->getMessage();
    } catch (EmailException $e) {
        $errors['email'] = $e->getMessage();
    } catch (UserTypeException $e) { 
        $errors['user_type'] = $e->getMessage();
    } catch (CommentsException $e) {
        $errors['comment'] = $e->getMessage();
    } catch (PhoneException $e) {        
        $errors['phone'] = $e->getMessage();
    } catch (AgeException $e) {          
        $errors['age'] = $e->getMessage();
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