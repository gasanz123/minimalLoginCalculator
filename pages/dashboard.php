<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome To Dashboard</h2>
    <p><a href="logout.php">Logout</a></p>
    
    <form method="post" action="">
        <h3>Calculator</h3>
        <label>First number:</label>
        <input type="text" name="num1"><br><br>
        
        <label>Second number:</label>
        <input type="text" name="num2"><br><br>
        
        <label>Operator:</label>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br><br>
        
        <input type="submit" value="Calculate">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = 0;

        switch ($operator) {
            case "+":
                $result = $num1 + $num2;
                break;
            case "-":
                $result = $num1 - $num2;
                break;
            case "*":
                $result = $num1 * $num2;
                break;
            case "/":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    echo "Error: Division by zero.";
                }
                break;
            default:
                echo "Invalid operator.";
        }

        echo "Result: " . $result;
    }
    ?>
</body>
</html>