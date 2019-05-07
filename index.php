<html>
    <head>
        <title>PHP Test</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        
        <form class="index-form" action="action.php" method="post">
            <p>Your first name: <input type="text" name="firstname" /></p>
            <p>Your last name: <input type="text" name="lastname" /></p>
            <p><button type="submit">Submit</button></p>
        </form>

        <h2>Current Guests</h2>
        <?php
        //test comment added
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";
        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "<tr>" . "\n";
            }
        }
        require __DIR__ . '/vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::create(__DIR__);
        $dotenv->load();
        $servername = getenv('servername');
        $username = getenv('username');
        $password = getenv('password');
        $dbname = getenv('dbname');

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e>getMessage();
        }
        $conn = null;
        echo "</table>";

        ?>
        <?php
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
                echo 'You are using MSIE.';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
                echo 'You are using Firefox.';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
                echo 'You are using Chrome.';
            }
        ?>
    </body>
</html>