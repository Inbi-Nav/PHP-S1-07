<?php
function startSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function saveToSession($name, $email, $userType, $userComment) {
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_type'] = $userType;
    $_SESSION['user_comment'] = $userComment;
}

function getSessionData() {
    return [
        'user_name' => $_SESSION['user_name'] ?? '',
        'user_email' => $_SESSION['user_email'] ?? '',
        'user_type' => $_SESSION['user_type'] ?? '',
        'user_comment' => $_SESSION['user_comment'] ?? ''
    ];
}
?>