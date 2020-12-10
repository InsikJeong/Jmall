import Vue from 'vue';
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import Main from './views/Main.vue';
import Home from './views/Home.vue';
import router from './router';
import store from './store';
import 'bootstrap/dist/css/bootstrap.css'; 
import 'bootstrap';

Vue.component('Header-component',Header);
Vue.component('Footer-component',Footer);
Vue.component('pagination', require('laravel-vue-pagination'));

new Vue({
    el: '#app', 
    router,
    store,
    render: h => h(Home) 
});