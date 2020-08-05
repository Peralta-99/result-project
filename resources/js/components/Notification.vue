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
                            text: notification.message,
                            theme: 'sunset',
                            type: 'success'
                        }).show()
                        document.getElementById("noty_audio").play();
                    })
            }
        }
    }
</script>

<style scoped>

</style>
