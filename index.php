<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        
        <form action="action.php" method="post">
            <p>Your name: <input type="text" name="name" /></p>
            <p>Your age: <input type="text" name="age" /></p>
            <p><input type="submit" /></p>
        </form>
        <?php
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
                echo 'You are using MSIE.';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
                echo 'You are using Firefox.';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
                echo 'You are using Chrome.';
            }
        ?>

        <?php
            require __DIR__ . '/vendor/autoload.php';
            $dotenv = Dotenv\Dotenv::create(__DIR__);
            $dotenv->load();
            $servername = getenv('servername');
            $username = getenv('username');
            $password = getenv('password');
            $myDB = getenv('myDB');

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
                }
            catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }
        ?> 
    </body>
</html>