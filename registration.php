<?php 
if(isset($_POST['register'])){
    $error = false;
    $message = [];
    require("inc/connection.php");
    $name = $conn->escape_string($_POST['name']) ;
    $email = $conn->escape_string($_POST['email']);
    $pass1 = $_POST['password'];
    $pass2 = $_POST['repassword'];
    if($pass1 !== $pass2){$error = true; $message[] = "password mismatched";}
    if($name == ""){$error = true; $message[] = "name required";}
    if($email == ""){$error = true; $message[] = "email required";}
    if(!$error){
        $insertQuery = "INSERT INTO users values(null,'" . $name . "','" . $email . "','" .password_hash($pass1,PASSWORD_DEFAULT). "','1',null)";
        $conn->query($insertQuery);
        if($conn->affected_rows){
            header("location:login.php?m=registration successfull now you can login");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="assets/css/olthostyle.css">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>REGISTER NOW</h3>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="repassword" required placeholder="confirm your password">
            <!-- <select name="user_type" id="">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select> -->
            <input type="submit" name="register" value="register now" class="form-btn">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>
</body>
</html> 