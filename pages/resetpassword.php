<?php
include '../database/db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($password === $confirmPassword) {
        $sql = "UPDATE userdata SET password = '$hashedPassword' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            $message = "Password updated successfully";
        } else {
            $message = "Error updating password";
        }
    } else {
        $message = "Passwords do not match";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <?php if ($message): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
    
    <form method="post" action="">
        <h2>Reset Password</h2>
        <label>Email:</label><br>
        <input type="text" name="email" required><br><br>
        
        <label>New Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <label>Confirm Password:</label><br>
        <input type="password" name="confirm_password" required><br><br>
        
        <input type="submit" value="Reset Password">
    </form>
    
    <p>
        <a href="register.php">Create Account</a> | 
        <a href="login.php">Login</a>
    </p>
</body>
</html>