<template>
    <div>
        <article class="container mt-3" id="app-article">
            <div v-if="loading ==true"
                 style="font-size: 32px; background: #fff; border-radius: 15px; text-align: center;"
                 class="col-12 p-4">
                <p style="color: #444;">درحال لود ...</p>
            </div>
            <div class="row" v-if="loading==false">
                <div class="col-12">
                    <div style="border-radius: 15px;">
                        <header id="article-header">
                            <h2 id="article-title">
                                {{ article.title }}
                            </h2>
                        </header>
                        <main id="main-article">
                            <div v-html="article.body"></div>
                        </main>
                    </div>
                </div>
            </div>

        </article>
    </div>
</template>

<script>
    import axios from 'axios';
    import AppHeader from './../../Components/AppHeader.vue';
    export default {
        name: "Show",
        components:{
            AppHeader
        },
        data() {
            return {
                loading: false,
                article: null,
                error: null,
            };
        }
        ,
        created() {
            this.fetchData();
        }
        ,
        methods: {
            fetchData() {
                this.error = this.articles = null;
                this.loading = true;
                axios.get(`/api/article?slug=${this.$route.params.slug}`)
                    .then(response => {
                        this.loading = false;
                        this.article = response.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>