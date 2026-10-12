
<!DOCTYPE html>
<html>
<head>
    <title>Order Status</title>
</head>
<body>

<h2>Order Status Handler</h2>

<form method="post">
    Enter Order Number:
    <input type="text" name="order" required>
    <button type="submit" name="check">Check Status</button>
</form>

<?php
if (isset($_POST["check"])) {

    $order = $_POST["order"];

    switch ($order) {
        case "101":
            echo "Order is Pending";
            break;

        case "102":
            echo "Order is Processing";
            break;

        case "103":
            echo "Order is Shipped";
            break;

        case "104":
            echo "Order is Delivered";
            break;

        case "105":
            echo "Order is Cancelled";
            break;

        default:
            echo "Order Number Not Found";
    }
}
?>

</body>
</html>