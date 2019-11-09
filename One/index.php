<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Login/Signup</h1>
<?php
    require "header.php";
?>
    <main>
        <?php
            if(isset($_SESSION['userId']))//will only be set if log-in is successful 
            {
                echo "<p>You are logged in!</p>";

            }
            else
            {
                echo "<p>You are logged out!</p>";
            }
            ?>
        
        
    </main>
<?php
    require "footer.php";
?>
</body>
</html>