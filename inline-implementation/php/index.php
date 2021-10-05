<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inline Implementation Example for Static PHP</title>
    <!-- Imported the inline implementation script -->
    <script src="https://checkout.coinforbarter.com/v1/script.js"></script>
</head>

<body>
    <button type="button" onClick="makePayment()">Pay Now</button>
    <?php
    $transaction_ref =  $_GET["transactionRef"];
    $transaction_id = $_GET["transaction_id"];
    $status = $_GET["transaction_id"];

    if ($status !== 'success') {
        echo "<h1> Error </h1>";
    } else {
        // you might verify the transaction here 
        // update transaction database.
        echo "<h1> Success </h1>";
    }
    ?>
    <script>
        function makePayment() {
            CoinForBarterCheckout({
                publicKey: "<?php echo $public_key ?>", //public_key fetched from server
                txRef: "RX1",
                amount: 10,
                currency: "BTC",
                redirectUrl: "http://example.com",
                currencies: [], //accept all currencies if you leave it empty
                meta: {
                    consumer_id: 23,
                },
                customer: "example@gmail.com",
                customerPhoneNumber: "+234xxxxxx",
                customerFullName: "John Doe",
                customizations: {
                    title: "My store",
                    description: "Payment for items in cart",
                    logo: "https://assets.example.com/logo.png",
                },
                onError: (data) => {
                    console.log(data);
                    alert(data.message)
                },
                onSuccess: (data) => {
                    console.log(data);
                    // push data to server here to validate the transaction against the returned data

                    // in this case I will reload the page for php to get the returned params in the url

                    location.reload()
                }
            });
        }
    </script>
</body>

</html>