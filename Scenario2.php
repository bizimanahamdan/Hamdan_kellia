
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Stock Check</title>
</head>
<body>

    <h1>Inventory Stock Check System</h1>

    <form method="post">

        <h3>Enter Product Quantities</h3>

        <label>Product 1:</label>
        <input type="number" name="qty1" min="0" step="1" required>
        <br><br>

        <label>Product 2:</label>
        <input type="number" name="qty2" min="0" step="1" required>
        <br><br>

        <label>Product 3:</label>
        <input type="number" name="qty3" min="0" step="1" required>
        <br><br>

        <label>Product 4:</label>
        <input type="number" name="qty4" min="0" step="1" required>
        <br><br>

        <label>Product 5:</label>
        <input type="number" name="qty5" min="0" step="1" required>
        <br><br>

        <button type="submit" name="check">
            Check Stock
        </button>

    </form>

    <?php if (isset($_POST['check'])) {
      // Store product quantities in an array
      $inventory = [
        $_POST['qty1'],
        $_POST['qty2'],
        $_POST['qty3'],
        $_POST['qty4'],
        $_POST['qty5'],
      ];

      // Count products out of stock
      $outOfStock = 0;

      echo '<h2>Stock Report</h2>';

      // Check each product
      for ($i = 0; $i < 5; $i++) {
        if ($inventory[$i] == 0) {
          echo 'Product ' . ($i + 1);
          echo ' is OUT OF STOCK<br>';

          $outOfStock++;
        } else {
          echo 'Product ' . ($i + 1);
          echo ' is IN STOCK';
          echo ' (Quantity: ' . $inventory[$i] . ')<br>';
        }
      }

      // Display the summary
      echo '<h3>Inventory Summary</h3>';

      echo 'Total products: 5<br>';

      echo 'Out of stock: ' . $outOfStock . '<br>';

      echo 'In stock: ' . (5 - $outOfStock);
    } ?>

</body>
</html>

