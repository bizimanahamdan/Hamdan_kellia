
<!DOCTYPE html>
<html>
<head>
    <title>Electronics Shop Inventory</title>
</head>
<body>

<h2>Electronics Shop Stock Check</h2>

<form method="post">
    Enter stock quantities:

    <p>Smartphones:
        <input type="number" name="q1" min="0" required>
    </p>

    <p>Laptops:
        <input type="number" name="q2" min="0" required>
    </p>

    <p>Headphones:
        <input type="number" name="q3" min="0" required>
    </p>

    <p>Chargers:
        <input type="number" name="q4" min="0" required>
    </p>

    <p>Televisions:
        <input type="number" name="q5" min="0" required>
    </p>

    <button type="submit" name="check">Check Stock</button>
</form>

<?php
if (isset($_POST["check"])) {

    $products = array(
        "Smartphones",
        "Laptops",
        "Headphones",
        "Chargers",
        "Televisions"
    );

    $stock = array(
        $_POST["q1"],
        $_POST["q2"],
        $_POST["q3"],
        $_POST["q4"],
        $_POST["q5"]
    );

    for ($i = 0; $i < 5; $i++) {

        if ($stock[$i] == 0) {
            echo $products[$i] . ": OUT OF STOCK<br>";
        } else {
            echo $products[$i] . ": " . $stock[$i] . " available<br>";
        }
    }
}
?>

</body>
</html>
