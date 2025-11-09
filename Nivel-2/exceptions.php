<?php

class NameException extends Exception {
    public function __construct($message = "Name Error!") {
        parent::__construct($message);
    }
}

class EmailException extends Exception {
    public function __construct($message = "Email Error") {
        parent::__construct($message);
    }
}

class UserTypeException extends Exception {
    public function __construct($message = "User Type Error") {
        parent::__construct($message);
    }
}

class CommentsException extends Exception {
    public function __construct($message = "Error in comment") {
        parent::__construct($message);
    }
}
?>