<template>
    <div id="app">
        <div id="app-wapper">
            <Header></Header>
        </div>
    </div>
</template>

<script>

    import Header from "./Components/App/Header";
    export default {
        name: "App",
        data() {
            return {
                mt: "margin-top: 20px"
            }
        },
        components: {
            Header
        },
        mounted() {
        }

    }
</script>

<style scoped>

</style>