<template>
    <div>
        <ArticleBox v-bind="{ articles }" pagetitle="پست های مرتبط"></ArticleBox>

    </div>
</template>

<script>
    import axios from "axios";
    import ArticleBox from "../Components/ArticleBox/ArticleBox";
    import AppHeader from "../Components/AppHeader";

    export default {
        name: "Category",
        components: {ArticleBox, AppHeader},
        comments:{
            AppHeader,
          ArticleBox
        },
        data() {
            return {
                articles: null,
                loading: true
            }
        },created() {
            this.fetchData();
        }
        ,methods:{
            fetchData() {
                this.error = this.articles = null;
                this.loading = true;
                axios.get(`/api/category?slug=${this.$route.params.slug}`)
                    .then(response => {
                        this.loading = false;
                        this.articles = response.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>