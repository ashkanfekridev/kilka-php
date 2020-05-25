<template>
    <div>
        <ArticleBox v-bind="{ articles }" pagetitle="جدید ترین مطالب"></ArticleBox>
    </div>
</template>

<script>
    import ArticleBox from "../../Components/ArticleBox/ArticleBox";
    import axios from "axios";

    export default {
        name: "Index",
        components: {
            ArticleBox
        },
        data() {
            return {
                articles: null,
                loading: false,
                error: null
            }
        },
        created() {
            this.fetchData()
        },
        methods: {
            fetchData() {
                this.error = this.articles = null;
                this.loading = true;
                axios.get('/api/articles')
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