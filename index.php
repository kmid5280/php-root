<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php echo '<p>Hello World</p>'; ?>
        <?php
        function recursion($a)
        {
            if ($a < 20) {
                echo "$a\n";
                recursion($a+1);
            }
        }
        recursion(0)
    ?>
    </body>
</html>