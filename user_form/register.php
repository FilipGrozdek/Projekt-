<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        $xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('email', $email);
        $xml->addChild('password', $password);

        $filePath = 'users.xml';
        if (!file_exists($filePath)) {
            $xml->asXML($filePath);
        } else {
            $existingXml = simplexml_load_file($filePath);
            $newUser = $existingXml->addChild('user');
            $newUser->addChild('email', $email);
            $newUser->addChild('password', $password);
            $existingXml->asXML($filePath);
        }

        echo "User data saved successfully!";
    } else {
        echo "Invalid input. Please check your email and password.";
    }
} else {
    echo "Invalid request method.";
}
?>
