<script>
export default {
    data() {
        return {
            count:1
        }
    },

    methods: {
        increase(){
            this.count++;
        },
        decrease(){
            this.count--;
        },
    },

    render() {
        return this.$slots.default({
            count : this.count,
            increase : this.increase,
            decrease : this.decrease
        })
    },
}
</script>