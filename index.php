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