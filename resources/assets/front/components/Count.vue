<script>

export default {
    props: {
        price: {
            type: String,
            default: '0',
        }
    },
    data() {
        return {
            count: 1
        }
    },
    methods: {
        increment() {
            this.count += 1
        },
        decrement() {
            if (this.count > 1) {
                this.count -= 1
            } else {
                this.count = this.count
            }
        }
    },
    computed: {
        totalPrice() {
            return this.price * this.count
        }
    }
}
</script>