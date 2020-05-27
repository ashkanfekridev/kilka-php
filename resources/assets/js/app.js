//lib
import Vue from 'vue';
import VueRouter from 'vue-router'

//components
import App from './App.vue';





// //router
// Vue.use(VueRouter);
//
//
// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/',
//             name: 'Home',
//             component: Home
//         }, {
//             path: '/login',
//             name: 'login',
//             component: Login
//         },
//         {path: "*", component: PageNotFound}
//     ]
// });


new Vue({
    render: h => h(App),
    // router
}).$mount('#app');


