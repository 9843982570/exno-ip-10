<?php

function categorizeAge($age) {
    if ($age < 0) {
        return "Invalid age";
    } elseif ($age <= 12) {
        return "Child";
    } elseif ($age <= 19) {
        return "Teenager";
    } elseif ($age <= 59) {
        return "Adult";
    } else {
        return "Senior";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = isset($_POST["age"]) ? intval($_POST["age"]) : 0;
    $category = categorizeAge($age);
} else {
    $category = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Group Categorization</title>
</head>
<body>
    <h2>Age Group Categorization</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required>
        <button type="submit">Submit</button>
    </form>
    <?php if ($category): ?>
        <p>Your age group is: <?php echo $category; ?></p>
    <?php endif; ?>
</body>
</html>

