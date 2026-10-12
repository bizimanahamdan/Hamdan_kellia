
<?php
session_start();

// Create a demo account with an initial balance
if (!isset($_SESSION["balance"])) {
    $_SESSION["balance"] = 100000;
}

$message = "";
$messageType = "";
$balance = $_SESSION["balance"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $operation = $_POST["operation"];

    switch ($operation) {

        case "check":

            $message = "Your current balance is " .
                number_format($balance) . " RWF.";
            $messageType = "success";
            break;

        case "deposit":

            $amount = $_POST["amount"];

            if ($amount <= 0 || $amount == "") {

                $message = "Please enter a deposit amount greater than zero.";
                $messageType = "error";

            } else {

                $balance = $balance + $amount;
                $_SESSION["balance"] = $balance;

                $message = "Deposit successful! " .
                    number_format($amount) .
                    " RWF has been added to your account.";
                $messageType = "success";
            }

            break;

        case "withdraw":

            $amount = $_POST["amount"];

            if ($amount <= 0 || $amount == "") {

                $message = "Please enter a withdrawal amount greater than zero.";
                $messageType = "error";

            } else if ($amount > $balance) {

                $message = "Insufficient funds. You cannot withdraw more than your balance.";
                $messageType = "error";

            } else {

                $balance = $balance - $amount;
                $_SESSION["balance"] = $balance;

                $message = "Withdrawal successful! " .
                    number_format($amount) .
                    " RWF has been withdrawn.";
                $messageType = "success";
            }

            break;

        case "exit":

            $message = "Thank you for using Smart ATM. Your session balance has been saved.";
            $messageType = "success";
            break;

        default:

            $message = "Please select a valid ATM operation.";
            $messageType = "error";
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Smart ATM</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 20px;
            color: #1e293b;
        }

        .container {
            max-width: 430px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 25px;
        }

        .balance-card {
            background: #0f766e;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .balance-card p {
            margin: 0 0 10px;
        }

        .balance {
            font-size: 28px;
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select, input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 16px;
            background: white;
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 7px;
            background: #0f766e;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #115e59;
        }

        .message {
            padding: 14px;
            margin-top: 20px;
            border-radius: 7px;
            line-height: 1.5;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .note {
            margin-top: 20px;
            color: #64748b;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Smart ATM</h1>

    <p class="subtitle">Simple, secure banking simulation</p>

    <div class="balance-card">
        <p>Available Balance</p>

        <div class="balance">
            <?php echo number_format($_SESSION["balance"]); ?> RWF
        </div>
    </div>

    <form method="post">

        <label for="operation">Choose an operation</label>

        <select name="operation" id="operation" required>
            <option value="">-- Select Operation --</option>
            <option value="check">Check Balance</option>
            <option value="deposit">Deposit Money</option>
            <option value="withdraw">Withdraw Money</option>
            <option value="exit">Exit ATM</option>
        </select>

        <label for="amount">
            Amount (RWF) — only for deposits or withdrawals
        </label>

        <input
            type="number"
            name="amount"
            id="amount"
            min="1"
            step="1"
            placeholder="Enter amount, e.g. 5000"
        >

        <button type="submit">Perform Operation</button>

    </form>

    <?php if ($message != "") { ?>

        <div class="message <?php echo $messageType; ?>">
            <?php echo $message; ?>
        </div>

    <?php } ?>

    <p class="note">
        Training demo only. No real bank account is connected.
    </p>

</div>

</body>
</html>

