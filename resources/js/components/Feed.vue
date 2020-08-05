<template>
    <div class="container">
        <div class="row" style="margin-top: 25px !important;">
            <div class="col-lg-10 offset-lg-1">
                <div class="card" v-for="post in posts">
                    <div class="card-header">
                        <img :src="post.user.avatar" alt="" width="38px" height="38px" class="avatar-feed">
                        {{ post.user.name }}
                        <span class="float-right">{{post.created_at}}</span>
                    </div>

                    <div class="card-body">
                        <p class="text-center">
                            {{ post.content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            this.get_feed()
        },
        methods: {
            get_feed() {
                axios
                    .get('/feed')
                    .then((response) => {
                        response.data.forEach((post)=>{
                            this.$store.commit('add_post', post);
                        })
                    })
            }
        },
        computed: {
            posts() {
                return this.$store.getters.all_posts
            }
        }

    }
</script>

<style scoped>
    .avatar-feed{
        border-radius: 50%;
    }
</style>
