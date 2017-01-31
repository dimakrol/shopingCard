<template>
    <div class="container">
        <h1>Buy our books!!!</h1>
        <form action="/purchases" method="POST">

            <input type="hidden" name="stripeToken" v-model="stripeToken">
            <input type="hidden" name="stripeEmail" v-model="stripeEmail">

            <button class="btn btn-default" type="submit" @click.prevent="buy">Buy My Book</button>
        </form>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                stripeEmail: '',
                stripeToken: ''
            }
        },

        created() {
            this.stripe = StripeCheckout.configure({
                key: Laracasts.stripeKey,
                image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                locale: "auto",
                token: (token) => {
                    this.stripeEmail = token.email;
                    this.stripeToken = token.id;

                    this.$http.post('/purchases', this.$data)
                            .then(response => alert('Complete'));
                }
            });
        },

        methods: {
            buy() {
                this.stripe.open({
                    name: 'Book',
                    description: 'Some book',
                    zipCode: true,
                    amount: 1000
                });
            }
        }

    }
</script>
