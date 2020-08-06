<template>
    <div class="container">
        <div class="row" style="margin-top: 25px !important;">
            <div class="col-lg-6 offset-lg-3">
                <input type="text" class="form-control" placeholder="search friends" v-model="query" @keyup.enter="search()">
                <br>
                <div class="row" v-if="results.length">
                    <div class="text-center" v-for="user in results">
                        <a :href="'/profile/' + user.slug"><img :src="user.avatar" alt="" width="65px" height="65px" class="searched-user"></a>
                        <h5 class="text-center">{{user.name}}</h5>
                    </div>
                    <br>
                </div>
                <br>
            </div>
        </div>
    </div>
</template>

<script>
    import algoliasearch from 'algoliasearch';
    const client = algoliasearch('RDUTABSQWX', '455b2c12969bd3db8c7769e7b81761cc');
    const index = client.initIndex('users');
    export default {
        mounted() {

        },
        data() {
            return {
                query: '',
                results: []
            }
        },
        methods: {
            search() {
                index.search(this.query).then(({ hits }) => {
                    this.results = hits;
                })
                .catch((error) => console.log(error));
            }
        }
    }
</script>

<style scoped>
.searched-user{
    border-radius: 50%;


}
</style>
