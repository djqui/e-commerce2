<?php
class User {
    private $username;
    private $password;
    private $email;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function saveUser() {
        // In a real application, you'd save to a database here
        // For this example, we'll use a session to simulate user storage
        $_SESSION['users'][] = [
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password
        ];
        return true;
    }

    public static function validateUser($email, $password) {
        if (isset($_SESSION['users'])) {
            foreach ($_SESSION['users'] as $user) {
                if ($user['email'] === $email && password_verify($password, $user['password'])) {
                    return $user['username'];
                }
            }
        }
        return false;
    }
}
?>