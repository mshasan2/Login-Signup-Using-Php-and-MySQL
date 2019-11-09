<?php
    require "header.php";
?>
    <main>
        <h1>Signup</h1>
        <?php
            if(isset($_GET['error']))
            {
                if($_GET['error']=='emptyfields'){
                    echo '<p>Fill in all Fields</p>';
                }
                elseif ($_GET['error']=='invaliduidmail'){
                    echo '<p>Invalid username and e-mail</p>';
                }
                
                elseif ($_GET['error']=='invalidmail'){
                    echo '<p>Invalid e-mail</p>';
                }
                
                elseif ($_GET['error']=='invaliduid'){
                    echo '<p>Invalid username</p>';
                }
                
                elseif ($_GET['error']=='passwordcheck'){
                    echo '<p>Your passwords do not match!</p>';
                }
                
                elseif ($_GET['error']=='usertaken'){
                    echo '<p>Username is already taken!</p>';
                }

            }
            elseif (isset($_GET['signup'])){
                if($_GET['signup'] == 'success')
                {
                echo '<p>Signup Successful!</p>';
                }
            }
        ?>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username"><br>
            <input type="email" name="mail" placeholder="E-mail"><br>
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat Password"><br>
            <button type="submit" name="signup-submit">Signup</button><br>

        </form>
    </main>
<?php
    require "footer.php";
?>