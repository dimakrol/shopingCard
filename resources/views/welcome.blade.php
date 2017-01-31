<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>

    <form id="checkout-form" action="/purchases" method="POST">
        {{ csrf_field() }}

        <input type="hidden" name="stripeToken" id="stripeToken">
        <input type="hidden" name="stripeEmail" id="stripeEmail">

        <button type="submit">Buy My Book</button>
    </form>


    <script src="https://checkout.stripe.com/checkout.js"></script>

    <script>
        var stripe = StripeCheckout.configure({
            key: "{{ config('services.stripe.key') }}",
            image: "https://stripe.com/img/documentation/checkout/marketplace.png",
            locale: "auto",
            token: function (token) {
                document.querySelector('#stripeToken').value = token.id;
                document.querySelector('#stripeEmail').value = token.email;

                document.querySelector('#checkout-form').submit();
            }
        });

        document.querySelector('button').addEventListener('click', function (e) {
            stripe.open({
                name: 'Book',
                description: 'Some book',
                zipCode: true,
                amount: 1000
            });

            e.preventDefault();
        })
    </script>

    </body>
</html>
