<?php 
if (isset($_POST['signup-submit']))//To Check if User has been redirected to this page after clicking the signup button
{
    require "dbh.inc.php";

    $username = $_POST["uid"];
    $email = $_POST["mail"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    //error-handlers
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ) //Empty Fields
    {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        header("Location: ../signup.php?error=invalidmailsuid");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))// Valid Email 
    {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username))// Valid Password 
    {
        header("Location: ../signup.php?error=Invalidusername&mail=".$email);
        exit();
    }
    elseif($password !== $passwordRepeat)//Password Matching !== are not same and not of same datatype
    {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {
        $sql="SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"s",$username);//s-string
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);//No. of matches
            if($resultCheck > 0)
            {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else{
                
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";//?-placeholder so that you dont have to send the acual value as it is not secure, id-auto_increment
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedpwd= password_hash($password, PASSWORD_DEFAULT);//to hash/encrypt the password
                    
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);//sss- 3 string
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                    
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
//If access gained without clicking signup button
else {
    header("Location: ../signup.php");
    exit();

}

?>