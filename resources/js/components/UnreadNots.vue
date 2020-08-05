<template>
    <li class="nav-item active">
        <a class="nav-link" href="/notifications">
            Unread notifications
            <span v-if="all_nots_count > 0" class="badge badge-secondary align-text-top">{{all_nots_count}}</span>
        </a>
    </li>
</template>

<script>
    export default {
        mounted() {
            this.get_unread()
        },
        methods: {
            get_unread() {
                axios
                    .get('/get_unread')
                    .then((nots) => {
                        nots.data.forEach((not)=>{
                            this.$store.commit('add_not', not)
                        })
                    })
            }
        },
        computed: {
            all_nots_count() {
                return this.$store.getters.all_nots_counted
            }
        }
    }
</script>

<style scoped>

</style>
