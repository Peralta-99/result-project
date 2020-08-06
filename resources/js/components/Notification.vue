<template>
    <div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.listen()
        },
        props: ['id'],
        methods: {
            listen() {
                Echo.private('App.User.' + this.id)
                    .notification((notification) => {
                        new Noty({
                            layout: 'topCenter',
                            text: notification.name + notification.message,
                            theme: 'sunset',
                            type: 'success'
                        }).show()
                        this.$store.commit('add_not', notification);
                        document.getElementById("noty_audio").play();
                    })
            }
        }
    }
</script>

<style scoped>

</style>
