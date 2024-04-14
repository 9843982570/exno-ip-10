<?php

function calculateGCD($num1, $num2) {
    $gcd = 1;
    $min = min($num1, $num2);
    for ($i = 1; $i <= $min; $i++) {
        if ($num1 % $i == 0 && $num2 % $i == 0) {
            $gcd = $i;
        }
    }
    return $gcd;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST["num1"]) ? intval($_POST["num1"]) : 0;
    $num2 = isset($_POST["num2"]) ? intval($_POST["num2"]) : 0;
    $result = calculateGCD($num1, $num2);
} else {
    $result = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greatest Common Divisor (GCD) Calculator</title>
</head>
<body>
    <h2>Greatest Common Divisor (GCD) Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="num1">Enter the first number:</label>
        <input type="number" id="num1" name="num1" required>
        <br>
        <label for="num2">Enter the second number:</label>
        <input type="number" id="num2" name="num2" required>
        <br>
        <button type="submit">Calculate GCD</button>
    </form>
    <?php if ($result !== ""): ?>
        <p>The Greatest Common Divisor (GCD) of <?php echo $num1; ?> and <?php echo $num2; ?> is: <?php echo $result; ?></p>
    <?php endif; ?>
</body>
</html>
