<template>
    <div>
        <hr>
        <p class="text-center" v-for="like in post.likes">
            <img :src="like.user.avatar" alt="" width="35px" height="35px" class="avatar-like">
        </p>
        <hr>
        <button class="btn btn-primary" v-if="!auth_user_likes_post" @click="like()">
            Like this post
        </button>
        <button class="btn btn-danger" v-else @click="unlike()">
            Dislike this post
        </button>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        props: ['id'],
        computed: {
            likes() {
                let likers = []
                this.post.likes.forEach((like) => {
                    likers.push(like.user.id)
                })
                return likers
            },
            auth_user_likes_post() {
                let check_index = this.likes.indexOf(
                    this.$store.state.auth_user.id
                )
                if (check_index === -1) return false;
                else return true
            },
            post() {
                return this.$store.state.posts.find((post) => {
                    return post.id === this.id
                })
            }
        },
        methods: {
            like() {
                axios
                    .get('/like/' + this.id)
                    .then((response) => {
                        this.$store.commit('update_post_likes', {
                            id: this.id,
                            like: response.data
                        })

                        new Noty({
                            layout: 'topCenter',
                            text: 'You successfully liked the post!',
                            theme: 'sunset',
                            type: 'success',
                            timeout: 3000
                        }).show()

                    })
            },
            unlike() {
                axios
                    .get('/unlike/' + this.id)
                    .then((response) => {
                        this.$store.commit('unlike_post', {
                            post_id: this.id,
                            like_id: response.data
                        })

                        new Noty({
                            layout: 'topCenter',
                            text: 'You successfully disliked the post!',
                            theme: 'sunset',
                            type: 'success',
                            timeout: 3000
                        }).show()

                    })

            }
        }
    }
</script>

<style scoped>
    .avatar-like{
        border-radius: 50%;
    }
</style>
