<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>

    <h1>Buy t-short $30.00</h1>

    <form action="/purchases" method="POST">
        {{ csrf_field() }}



        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ config('services.stripe.key') }}"
                data-amount="3000"
                data-name="T-short"
                data-description="Cool t-short"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="usd">
        </script>
    </form>
    </body>
</html>
