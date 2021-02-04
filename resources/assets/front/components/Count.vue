<script>

export default {
    data() {
        return {
            count: 1,
            total: ''
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
            this.count
        }
    }
}
</script>