<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula One Racing Blog - Drivers</title>
</head>
<body>
<header>
        <img src="pictures/header.jpg">
        <h1>Formula One Racing Blog</h1>
    </header>
    <nav>
        <a href="index.html">Home</a>
        <a href="fetch_news.php">News</a>
        <a href="insert_news.php">Add News</a>
        <a href="drivers.php">Drivers</a>
        <a href="contact.html">Contact</a>
        <a href="register.html">Register</a>
        <a href="login.html">Log In</a>
    </nav>
    <div class="container">
        <?php
       
        function fetchAllDrivers() {
            $apiUrl = "https://api.openf1.org/v1/drivers"; 

            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $apiUrl); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

            $response = curl_exec($ch); 
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            return json_decode($response, true);
        }

        $data = fetchAllDrivers(); 
         
        if (!empty($data)) {
            
            foreach ($data as $driver) {
                echo "<div class='driver'>";
                echo "<h2>" . htmlspecialchars($driver['full_name']) . "</h2>";  
                echo "<p>Team: " . htmlspecialchars($driver['team_name']) . "</p>";
                echo "<p>Country: " . htmlspecialchars($driver['country_code']) . "</p>";
                echo "<img src='" . htmlspecialchars($driver['headshot_url']) . "' alt='" . htmlspecialchars($driver['full_name']) . "'>";
                echo "</div>";
            }
        } else {
            echo "<p>No drivers found.</p>";
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2024 Formula One Racing Blog</p>
    </footer>
</body>
</html>
