<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="css/app.css">
    </head>

    <script>
        var Laracasts = {
            stripeKey: "{{ config('services.stripe.key') }}"
        }
    </script>

    <body>
    <div id="app">
        <payment></payment>
    </div>

    <script src="https://checkout.stripe.com/checkout.js"></script>

    <script src="js/app.js"></script>

    </body>
</html>
