<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
    <script
        src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>

    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            createOrder: function() {
                return fetch('payment.php', {
                    method: 'post',
                    headers: {
                    'content-type': 'application/json'
                    }
                }).then(function(res) {
                    return res.json();
                }).then(function(data) {
                    return data.orderID; // Use the same key name for order ID on the client and server
                });
            },
            onApprove: function(data) {
                return fetch('return.php?orderID='+data.orderID)
                .then(function(res) {
                    return res.json();
                }).then(function(details) {
                    alert('Transaction funds captured from ' + details.payer_given_name);
                })
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
      </script>
</body>