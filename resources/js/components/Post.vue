<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <textarea class="form-control" cols="10" style="resize: none !important;" rows="5" v-model="content"></textarea>
                        <br>
                        <button class="btn btn-success float-right" :disabled="not_working" @click="create_post()">
                            Create a post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return {
                content: '',
                not_working: true
            }
        },
        methods: {
            create_post() {
                axios
                    .post('/create/post', { content: this.content })
                    .then((response) => {
                        this.content = '';
                        new Noty({
                            layout: 'topCenter',
                            text: 'Your post has been published!',
                            theme: 'sunset',
                            type: 'success',
                            timeout: 2500
                        }).show()
                    })
            }
        },
        watch: {
            content() {
                if (this.content.length > 0) this.not_working = false;
                else this.not_working = true;
            }
        }
    }
</script>

<style scoped>

</style>
