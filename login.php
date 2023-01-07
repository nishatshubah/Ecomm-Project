 <?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
if(isset($_POST['login'])){
    require("inc/connection.php");
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $q = "SELECT * FROM users WHERE email='$email' limit 1"; //query
    $r = $conn->query($q); //record
    if($r->num_rows > 0){
        $rec = $r->fetch_assoc();
        if(password_verify($pass,$rec['password'])){
            $_SESSION['userid'] = $rec['id'];
            $_SESSION['name'] = $rec['name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $rec['role'];
            if( $rec['role'] == "1"){
                header('location:index.php');
            }
            if( $rec['role'] == "2"){
                header('location:admin_db/index.php');
            }
        }
    } 
    else{
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <link rel="stylesheet" href="assets/css/olthostyle.css">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h4><?php echo $_GET['m'] ?? ""; ?></h4>
            <h3>login now</h3>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="login" value="login now" class="form-btn">
            <p>don't have an account? <a href="registration.php">registration now</a></p>
        </form>
    </div>
</body>
</html> 