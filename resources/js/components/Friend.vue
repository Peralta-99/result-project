<template>
    <div class="container">
        <div class="row justify-content-center">
            <p v-if="loading">
                Loading...
            </p>
            <p v-if="!loading">
                <button class="btn btn-success" v-if="status === 0" @click="add_friend">Add Friend</button>
                <button class="btn btn-success" v-if="status === 'pending'" @click="accept_friend">Accept Friend</button>
                <span class="text-success" v-if="status === 'waiting'">Waiting for response</span>
                <span class="text-success" v-if="status === 'friends'">In your friends</span>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios
                .get('/check_relationship_status/' + this.profile_user_id)
                .then((response) => {
                    this.status = response.data.status;
                    this.loading = false
                })
        },
        props: ['profile_user_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {
            add_friend() {
                this.loading = true;
                axios
                    .get('/add_friend/' + this.profile_user_id)
                    .then((response) => {
                        if (response.data === 1) {
                            this.status = 'waiting';
                            new Noty({
                                layout: 'topCenter',
                                text: 'Friend request sent',
                                timeout: 1300,
                                theme: 'mint',
                                type: 'success'
                            }).show();
                            this.loading = false;
                        }
                    })
            },

            accept_friend() {
                this.loading = true;
                axios
                    .get('/accept_friend/' + this.profile_user_id)
                    .then((response) => {
                        if (response.data === 1) {
                            console.log('hi');
                            this.status = 'friends';
                            new Noty({
                                layout: 'topCenter',
                                text: 'You are now friend. Go ahead and hangout',
                                timeout: 1300,
                                theme: 'mint',
                                type: 'success'
                            }).show();
                            this.loading = false;
                        }
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            }


        }
    }
</script>
