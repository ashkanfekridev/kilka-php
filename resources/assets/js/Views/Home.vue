<template>
    <div>
        <p>home</p>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Home",
        components: {
        },
        data() {
            return {
                articles: null,
                categoryes: null,
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
                axios.get('/api/landing')
                    .then(response => {
                        this.loading = false;
                        this.articles = response.data.articles;
                        this.categoryes = response.data.categories;
                    });
            }
        }

    }
</script>

<style scoped>
    .avatar {
        width: 100%;
        display: block;
        border-radius: 8px;
        box-shadow: 0px 10px 20px 20px rgba(200, 200, 200, 0.6);
    }

    .h-center {
        display: flex;
        align-items: center;

    }

    .color-light {
        color: #666666;
    }
</style>