<?php
$result_message = '';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $standard_price = 50.0;
  $customer_age = intval($_POST['customer_age']);

  // Logic: If age is 65 or older, apply 20% senior discount
  if ($customer_age >= 65) {
    $discount_amount = $standard_price * 0.2;
    $final_price = $standard_price - $discount_amount;
    $result_message = "Age: $customer_age. Senior discount applied! Final Price: $$final_price";
  } else {
    $final_price = $standard_price;
    $result_message = "Age: $customer_age. Standard rate applies. Final Price: $$final_price";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scenario 1: Age-Based Discount</title>
</head>
<body>

    <h2>Online Ticketing System - Age Verification</h2>
    
    <!-- HTML Form -->
    <form method="POST" action="">
        <label for="customer_age">Enter Customer Age:</label>
        <input type="number" id="customer_age" name="customer_age" required>
        <button type="submit">Check</button>
    </form>

    <?php if (!empty($result_message)): ?>
        <!-- JavaScript pop-up alert displaying the PHP result -->
        <script>
            alert("<?php echo $result_message; ?>");
        </script>
    <?php endif; ?>

</body>
</html>
