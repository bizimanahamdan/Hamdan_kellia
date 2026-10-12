
<!DOCTYPE html>
<html>
<head>
    <title>Order Status Handler</title>
</head>
<body>

    <h1>Order Status Handler</h1>

    <form method="post">

        <label>Enter Order Status:</label>

        <select name="status" required>
            <option value="">-- Select Status --</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <br><br>

        <button type="submit" name="check">
            Check Order Status
        </button>

    </form>

    <?php if (isset($_POST['check'])) {
      $status = $_POST['status'];

      echo '<h2>Order Status Result</h2>';

      switch ($status) {
        case 'pending':
          echo 'Your order is waiting to be processed.';
          break;

        case 'processing':
          echo 'Your order is being prepared.';
          break;

        case 'shipped':
          echo 'Your order has been shipped.';
          break;

        case 'delivered':
          echo 'Your order has been delivered successfully.';
          break;

        case 'cancelled':
          echo 'Your order has been cancelled.';
          break;

        default:
          echo 'Invalid order status.';
          break;
      }
    } ?>

</body>
</html>
