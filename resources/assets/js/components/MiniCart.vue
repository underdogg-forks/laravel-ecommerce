<template>
    <router-link to="/cart">
        <span class="glyphicon glyphicon-shopping-cart"></span> {{ amount }}st | {{ sum.toLocaleString() }} {{ currency }}
    </router-link>
</template>

<script>
    export default {

        mounted() {
            Event.$on('updated_cart', () => {
                this.getOrderItems();
            });

            this.getOrderItems();
        },

        data() {
            return {
                currency: window.Laravel.currencySign,
                orderItems: [],
                amount: 0,
                sum: 0.0,
            }
        },

        methods: {
            getOrderItems() {

                /*var order_id = (localStorage.order_id !== 'undefined') ? localStorage.order_id : null;

                if (order_id) {
                    axios.get('/api/orders/' + order_id + '/items').then((response) => {
                        this.orderItems = response.data.items;

                        this.amount = 0;
                        this.sum = 0;
                        for (var i = 0; i < this.orderItems.length; i++) {
                            this.amount += this.orderItems[i].amount;
                            this.sum += (parseFloat(this.orderItems[i].product.price) * this.orderItems[i].amount);
                        }
                    })
                }*/

            }
        }
    }
</script>