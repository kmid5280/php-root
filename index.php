<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php echo '<p>Hello World</p>'; ?>
        <form action="action.php" method="post">
            <p>Your name: <input type="text" name="name" /></p>
            <p>Your age: <input type="text" name="age" /></p>
            <p><input type="submit" /></p>
        </form>
        <?php phpinfo(); ?>
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