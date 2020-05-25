<template>
    <!-- header -->
    <header id="app-header" :class="toggleNavClass()">
        <div class="container">
            <nav class="navbar row">
                <div class="col-auto">
                    <a class="header-logo" href="/">اشکان فکری</a>
                </div>

                <div class="col-auto media-full-w">
                    <ul class="nav-list">
                        <li class="nav-list_item">
                            <router-link :to="{ name: 'Home' }" exact>خانه</router-link>
                        </li>
                        <li class="nav-list_item">
                            <router-link :to="{ name: 'AboutMe'}">درباره من</router-link>
                        </li>
                        <li class="nav-list_item">
                            <router-link :to="{ name: 'ContactMe'}">تماس با من</router-link>
                        </li>
                        <li class="nav-list_item">
                            <router-link :to="{ name: 'Article.index'}">مقالات</router-link>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </header>
    <!-- header -->
</template>

<script>
    export default {
        name: "Header",
        data() {
            return {
                active: false
            }
        }, methods: {
            toggleNavClass() {
                if (this.active == false) {
                    return 'nav'
                } else {
                    return 'sticky-nav'
                }

            }
        },
        mounted() {
            document.getElementById("app-wapper").style.marginTop = document.getElementById('app-header').clientHeight + "px";

            window.document.onscroll = () => {
                let navBar = document.getElementById('app-header');
                var scroll = window.scrollY;
                var navHeight = navBar.clientHeight;
                document.getElementById("app-wapper").style.marginTop = document.getElementById('app-header').clientHeight + "px";
                if (scroll > 10) {
                    this.active = true;

                } else {
                    this.active = false;
                }

            }
        }
    }
</script>

<style scoped>
    header#app-header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 600;
        transition: 0.5s;
        /*padding-top: 30px;*/
        /*padding-bottom: 30px;*/
        /*background: transparent;*/

    }

    header#app-header.sticky-nav {
        transition: 0.5s;
        background: #fff !important;
        box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);


        /*padding-top: 0px;*/
        /*padding-bottom: 0px;*/

    }

    a.router-link-active {
        color: #444 !important;
        font-weight: 600 !important;
    }


    @media (max-width: 460px) {
        ul.nav-list {
            border-top: 1px solid #eee;

            flex-wrap: wrap;

        }

        ul.nav-list li {
            margin-left: 15px;
        }

        ul.nav-list li a {
            font-weight: normal;
            padding: 8px 0;
        }

        .media-full-w {
            width: 100%;
        }

        a.router-link-active {
            border-bottom: 2px solid #666;
            color: #333 !important;
        }

    }
</style>