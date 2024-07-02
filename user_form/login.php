<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $filePath = 'users.xml';
    if (file_exists($filePath)) {
        $xml = simplexml_load_file($filePath);
        $userFound = false;

        foreach ($xml->user as $user) {
            if ($user->email == $email) {
                if ($password == $user->password) {
                    
                    $userFound = true;
                    echo "Login successful! Welcome, " . $email . "!";
                    break;
                } else {
                    echo "Invalid password.";
                }
            }
        }

        if (!$userFound) {
            echo "User not found.";
        }
    } else {
        echo "No users found. Please register first.";
    }
} else {
    echo "Invalid request method.";
}
?>
