<template>
    <div id="app">
        <div id="app-wapper">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>

    export default {
        name: "App",
        data() {
            return {
                mt: "margin-top: 20px"
            }
        },
        components: {
        },
        mounted() {
        }

    }
</script>

<style scoped>

</style>